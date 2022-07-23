@extends('admin/login_layout')
@section('page_title','Forget Password')
@section('container_login')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
<div class="login-content">    
    <div class="login-form">
        <h1>Forget Password</h1>
        <form action="{{url('forget/password')}}" method="post">
            @csrf
            <div class="form-group">
                    <label>Email Address</label>
                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Security code</label>
                    <input class="au-input au-input--full" type="text" name="sc_code" placeholder="Security code">
                    @error('sc_code')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Submit</button>
        </form>
    </div>
</div>
    
@endsection