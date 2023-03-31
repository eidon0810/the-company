<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div style="height: 100vh;">
     <div class="row h-100 m-0">
        <div class="card w-25 mx-auto my-auto">
            <div class="card-header bg-transparent border-0 py-3">
                <h1 class="text-center text-uppercase">Login</h1>
            </div>
            <div class="card-body">
                <form action="../actions/login.php" method="post">
                    <input type="text" class="form-control mb-2" name="username" required autoforcus placeholder="USERNAME">
                    
                    <input type="password" class="form-control mb-2" name="password" required placeholder="PASSWORD">

                    <button type="submit" class="btn btn-primary w-100">LOG IN</button>
                </form>
                <p class="text-center mt-3 small"><a href="register.php">Create Account</a></p>
            </div>
        </div>
     </div>
    </div>
    
</body>
</html>