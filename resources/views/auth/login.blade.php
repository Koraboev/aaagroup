@extends('layouts.layout')
@section('content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left"> <img style="background-color: white;border-radius:50%" class="img-fluid" src="assets/img/logo.png" alt="Logo"> </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Tizimga kirish oynasi</p>
                        
                        <form method="post" action="{{ route('auth') }}">
                        @csrf
                            <div class="form-group">
                                <input class="form-control" name="email" type="text" placeholder="Username" required /> </div>
                                <br>
                            <div class="form-group">
                                <input class="form-control" name="password" type="password" placeholder="Password" required /> </div>
                                <br>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        @if($errors->any())
                        <span style="color: red;">{{$errors->first()}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection