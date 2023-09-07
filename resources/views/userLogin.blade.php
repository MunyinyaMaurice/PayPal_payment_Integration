<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
   
    <div class="container-fluid bg-primary form-control radius-10 px-5 py-5 w-50 h-50 mt-5">
        <div class="header text-center text-white px-2 ">
            <h2>USER LOGIN</h2>
        </div>
        <div class="main">
            <form action="{{route('logging.post')}}" method="POST">
        <div class="row">
            <div class="col-6 mt-3">
                <div class="form-group">
                   
                    <input type="email" name="email" id="email" class="form-control radius-10" required placeholder="Enter your Email">
                </div>
            </div>
            <div class="col-6 mt-3">
                <div class="form-group">
                    
                    <input type="password" name="password" id="password" class="form-control radius-10" required placeholder="Enter your password">
                </div>
            </div>
            <div class="text-white  text-center ">
                <div class="form-group ">
                    <input type="submit" class="btn btn-primary mt-4 " value="Login">
                   <h6> create new account <a href="userRegister.blade.php"> sign up</a> </h6>
                </div>
            </div>
        </div>
      
            </form>
        </div>
    </div>
</body>
</html>
