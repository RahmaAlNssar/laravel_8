@extends('layouts.admin')
@section('title')
{{__('sidebar.roles')}}
@endsection
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
@endsection
@section('content')



<section class="content">

    <div class="container-fluid">
        <br>
        <div class="row container">

            <a href="{{ route('admin.roles.index') }}" class="btn btn-info">
                {{__('dashboard.back')}}
            </a>

        </div>
        <br>
        <div class="content-detached">
            <div class="content-body">
                <div class="card">


                    <div class="card-body">


                        @if(isset($row))
                        <form action="{{route('admin.roles.update',$row->id)}}" method="post" class="submit-form" enctype="multipart/form-data">
                            @method('put')
                            @else
                            <form action="{{route('admin.roles.store')}}" method="post" class="submit-form" enctype="multipart/form-data">
                                @endif
                                @csrf

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{__('dashboard.name')}}:</label>
                                    <input type="text" class="form-control" name="name" value="{{$row->name ?? old('name')}}" id="recipient-name">
                                    <span class="error red" id="name-error" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{__('dashboard.permissions')}}:</label>
                               
                                <br>
                                    @if(App::getLocale() == 'en')
                                 
                                    @foreach($permission as $value)
                                    @if(isset($row))
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                    @else
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
 
                                    <br />
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach($permission as $value)
                                    @isset($row)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                    @else
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name_ar }}</label>
                                    <br />
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                                    <button type="submit" class="btn btn-primary submit">{{__('dashboard.save')}}</button>
                                </div>

                            </form>

                    </div>

                </div>
            </div>
        </div>
    </div>


</section>
@endsection