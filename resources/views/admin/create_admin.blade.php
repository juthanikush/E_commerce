@extends('admin/login_layout')
@section('page_title','Admin Create')
@section('container_login')
<h1>Create Admin</h1>
    <div class="login-content">
        
        <div class="login-form">
            <form action="{{url('create/admin')}}" method="post">
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
                    <label>Username</label>
                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                    @error('username')
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
                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Add</button>
                
            </form>
            
        </div>
    </div>
@endsection