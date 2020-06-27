<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card" style = "background-color:#EEE9E9; width:500px; margin-left:300px;">
        <article class="card-body" >
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form action="/auth/register" method="POST">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input class="form-control" placeholder="username" type="text" name = "username">
                </div> <!-- form-group// -->
                @error('username')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="password" type="password" name = "password">
                </div> <!-- form-group// -->
                @error('password')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input  class="form-control" placeholder="Email" type="email" name = "email">
                </div> <!-- form-group// -->
                @error('email')
                    <div style="color:red; margin-top:20px;">{{ $message }}</div>
                @enderror

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input  class="form-control" placeholder="Address" type="text" name = "address">
                </div> <!-- form-group// -->
                @error('address')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="">Log In</a> </p>
        </form>
        </article>
        </div> <!-- card.// -->
        </div>
</body>
</html>
