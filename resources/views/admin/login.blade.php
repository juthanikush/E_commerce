@extends('admin/login_layout')
@section('page_title','Login')
@section('container_login')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
@php
//prx($un);
if(!empty(session()->get('username')) && !empty(session()->get('password')))
{
    $username=session()->get('username');
    $password=session()->get('password');
    $is_remember="checked='checked'";
}
else
{
 
    $username='';
    $password="";
    $is_remember="";
}
@endphp
    <div class="login-content">
        
        <div class="login-form">
            <form action="{{url('admin/login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>UserName</label>
                    <input class="au-input au-input--full" type="text" name="username" value="{{$username}}" placeholder="Username">
                    @error('username')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password" value="{{$password}}" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" {{$is_remember}} name="remember">Remember Me
                    </label>
                    <label>
                        <a href="{{url('admin/forpass')}}">Forgotten Password?</a>
                    </label>
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
            </form>
        </div>
    </div>
@endsection