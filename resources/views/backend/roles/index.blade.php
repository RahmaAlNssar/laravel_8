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



<section class="content" id="div-content">

    <div class="container-fluid">
        <br>
        <div class="row container">

            <a href="{{ route('admin.roles.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> {{__('dashboard.add')}}
            </a>

            
        </div>
        <br>
        <div class="content-detached">
            <div class="content-body">
                <div class="card">


                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="table-responsive" id="here">
                                {{$dataTable->table()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-body -->


    </div>
</section>
@endsection
@push('js')

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{{$dataTable->scripts()}}

@endpush