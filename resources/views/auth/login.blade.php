<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{__('dashboard.log_in')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('backend-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend-assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">


    <div class="login-box">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
          
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
           
        </div>
        @endif
        <div class="login-logo">
        <img src="{{asset('backend-assets/dist/img/avatar5.png')}}" alt="" height="100" style="border-radius: 10px;">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
               

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input name="status" value="1" type="hidden">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{__('dashboard.name')}}" name="name" value="{{old('name')}}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                       
                    </div>
              
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder=" {{__('dashboard.password')}}" name="password" value="{{old('password')}}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                        
                    </div>
                  <div class="row">
                  <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"> {{__('dashboard.log_in')}} </button>
                        </div>
                        <div class="col-4">
                            <a type="button" href="{{route('register')}}" class="btn btn-primary btn-block btn-flat"> {{__('dashboard.register')}} </a>
                        </div>
                  </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember">
                                <label for="remember">
                                {{__('dashboard.remember_me')}} 
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                     
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('backend-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend-assets/custom/js/script.js') }}"></script>

</body>

</html>