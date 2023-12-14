<?php 
    require "function.php";

    if(isset($_POST["submit"])){
        if(register($_POST) >= 0){
            echo "
            <script>
                alert('Akun berhasil ditambah')
                document.location.href = 'login.php';
            </script>
			";
        }
        else {
            echo "
            <script>
                alert('Akun gagal ditambah')
                document.location.href = 'register.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <form action="" method="POST">
        <div class="register-session">
            <div class="content">
                <h2>Register</h2>
                <div class="mb-2 pt-3 column" style="margin-left: 60px !important;">
                    <label for="Username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Username" name="username" required>
                    </div>
                </div>
                <div class="mb-2 column" style="margin-left: 60px !important;">
                    <label for="Password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="Password" name="password" required>
                    </div>
                </div>
                <div class="mb-2 column" style="margin-left: 60px !important;">
                    <label for="Confirmpassword" class="col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="Confirmpassword" name="confirmpassword" required>
                    </div>
                </div>
                <div style="margin-left: 60px;">
                    <a href="login.php" style="color: #333333;">Login</a>
                </div>
                <div style="display: flex; justify-content: center;">
                    <button type="submit" class="register" name="submit">Register</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>