<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div style="height: 100vh;">
     <div class="row h-100 m-0">
        <div class="card w-25 mx-auto my-auto">
            <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center text-uppercase">register</h1>
            </div>
            <div class="card-body">
                <form action="../actions/register.php" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required autoforcus>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    
                    <!-- note: fw bold -->
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control fw-bold" id="username" name="username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control fw-bold" id="password" name="password" aria-describedby="password-info" minlength="8" required>
                        <div class="form-text" id="password-info">
                            Passward must be at least 8 characters long.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
                <p class="text-center mt-3 small">Registered already? <a href="../views">Log in.</a></p>
            </div>
        </div>
     </div>
    </div>
    
</body>
</html>