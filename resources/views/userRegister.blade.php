<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','userRegistration') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
   
</head>
<body>
    <div class="container-3d-inner mt-5">
    <div class="container-fluid bg-success form-control radius-10 px-2 py-5 w-50 h-50 mt-5 mx-auto shadow-lg  shadow-sm">
    
        <div class="header text-center text-white px-2 ">
            <h2>USER LOGIN</h2>
        </div>
        <div class="main">
            <form action="{{route('registers.post')}}" method="POST">
        @csrf
                <div class="row">
            <div class="col-8 mx-auto mt-3">
                <div class="form-group">
                   
                    <input type="name" name="name" id="name" class="form-control radius-10 mx-auto" required placeholder="Enter your full name">
                </div>
            </div>
            <div class="col-8 mx-auto mt-3">
                <div class="form-group">
                   
                    <input type="email" name="email" id="email" class="form-control radius-10" required placeholder="Enter your Email">
                </div>
            </div>
            <div class="col-8 mx-auto mt-3">
                <div class="form-group">
                   
                    <input type="text" name="phone" id="phone" class="form-control radius-10 " required placeholder="Enter your phone number">
                </div>
            </div>
            <div class="col-8 mx-auto mt-3">
                <div class="form-group">
                    
                    <input type="password" name="password" id="password" class="form-control radius-10 " required placeholder="Enter your password">
                </div>
            </div>
            <div class="col-8 mt-3 mx-auto">
                <div class="form-group">
                    
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control radius-10" required placeholder="Confirm your password">
                </div>
            </div>
            <div class="text-white  text-center ">
                <div class="form-group ">
                    <input type="submit" class="btn btn-primary mt-4 " value="Login">
                   <h6> Already have an account <a href="userLogin.blade.php"> Login</a> </h6>
                </div>
            </div>
        </div>
      
            </form>
        </div>
    </div>
    </div>
</body>
</html> 




