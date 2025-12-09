<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card mt-5 w-50">
                <x-SessionComponent/>
                <div class="card-header text-center">
                    <h2>LOGIN</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="col-8 mb-3">
                            <label for="email" class="form-label"> Email: </label>
                            <input type="text" name="email" id="eamil" class="form-control" value="{{old('email')}}">
                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-8 mb-4">
                            <label for="password" class="form-label">Password: </label>
                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control">
                            @error('password')
                               <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
