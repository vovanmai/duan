@extends('templates.shopsmp.homemaster')
@section('title')
Login - SMP Shop
@stop
@section('main-content')

<div class="banner-top">
    <div class="container">
        <h1>Login</h1>
        <em></em>
        <h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/</label>Login</h2>
    </div>
</div>
<!--login-->
<div class="content">
    <div class="container">
        <div class="login">
            @include('errors.error')

            <form name="" action="{{route('auth.login')}}" method="POST">
                {{ csrf_field() }}
            <div class="col-md-3 login-do">    
            </div>

            <div class="col-md-6 login-do">
                    <div class="row">
                     <div class="col-md-12">
                        @if(Session::has('msg'))
                        <p class="category danger alert alert-danger">{{Session::get('msg')}}</p>
                        @endif
                    </div>
                     </div>
                     @if (count($errors) > 0)
                    <div class="row">
                     <div class="col-md-12">
                        @foreach ($errors->all() as $error)
                        <p class="category danger alert alert-danger">{{ $error }}</p>
                        @endforeach
                    </div>
                     </div>
                     @endif
                    <div class="login-mail">
                        <input name="username" type="text" placeholder="Enter Your Username/Email" required="">
                        <i  class="glyphicon glyphicon-envelope"></i>
                    </div>
                    <div class="login-mail">
                        <input type="password" name="password" placeholder="Password" required="">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                    <div class="guest-buy-btn">
                        <label class="hvr-skew-backward">
                            <input type="submit" value="LOGIN">
                        </label>
                    </div>
            </div>
            <div class="col-md-3 login-do">    
            </div>
            </form>
             <!--    <div class="guest-buy-btn">
                <form name="guestForm" action="" method="POST">
                     {{ csrf_field() }}
                        
                         
                        
                    </form>
                </div> -->
             <!--    <div class="social-btn">
                    <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Sign in with Facebook
                    </a>
                    <a href="/auth/google" class="btn btn-block btn-social btn-google">
                        <span class="fa fa-google"></span> Sign in with Google
                    </a>
                </div> -->

            
         <!--    <div class="col-md-6 login-right">
             <h3>Completely Free Account</h3>

             <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
                 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                 <a href="{{route('auth.register')}}" class=" hvr-skew-backward">Register</a>

             </div> -->

             <div class="clearfix"> </div>
     </div>

 </div>

 @stop