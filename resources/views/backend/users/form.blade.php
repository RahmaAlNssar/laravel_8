@extends('layouts.admin')
@section('title')
{{__('sidebar.users')}}
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

            <a href="{{ route('admin.users.index') }}" class="btn btn-info">
                {{__('dashboard.back')}}
            </a>

        </div>
        <br>
        <div class="content-detached">
            <div class="content-body">
                <div class="card">


                    <div class="card-body">


                        @if(isset($row))
                        <form action="{{route('admin.users.update',$row->id)}}" method="post" class="submit-form">
                      
                        @method('put')
                        @else
                        <form action="{{route('admin.users.store')}}" method="post" class="submit-form" enctype="multipart/form-data">
                            @csrf
                            @endif
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{__('dashboard.name')}}:</label>
                                <input type="text" class="form-control" name="name" value="{{$row->name ?? old('name')}}" id="recipient-name">
                                <span class="error red" id="name-error" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="recipient-email" class="col-form-label">{{__('dashboard.email')}}:</label>
                                <input type="email" class="form-control" name="email" value="{{$row->email ?? old('email')}}" id="recipient-email">
                                <span class="error red" id="email-error" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="recipient-password" class="col-form-label">{{__('dashboard.password')}}:</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password')}}" id="recipient-password">
                                <span class="error red" id="password-error" style="color:red;"></span>
                            </div>

                            <div class="form-group">
                                <label for="recipient-password_confirmation" class="col-form-label">{{__('dashboard.password_confirmation')}}:</label>
                                {!! Form::password('confirm-password', array('class' => 'form-control')) !!}

                                <span class="error red" id="password_confirmation-error" style="color:red;"></span>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="recipient-role" class="col-form-label">{{__('dashboard.role')}}:</label>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                               
                                </div>
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