<!DOCTYPE html>
<html lang="en">
@include('header')
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-control" style="margin-top:20px">
                            <form action="{{route('login-user')}}" method="POST">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                </div>
                                <button class="btn btn-primary mt-3" type="submit">Login</button>
                            </form>
                        </div>
                        <div class="text-center my-4">
                            <div class="w-3/5 mx-auto mt-4">
                                <a href="{{route('google-auth')}}" class="btn btn-danger">Continue with Google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</html>