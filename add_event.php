<?php 
    session_start();

    if(!isset($_SESSION["login"])){
        echo "
            <script>
                alert('Anda harus login!')
                document.location.href = 'index.php';
            </script>
            ";
    }

    require "function.php";

    if(isset($_SESSION["login"]) === true){
        $is_login = true;
    }
    else {
        $is_login = false;
    }

    if(isset($_POST["submit"])){
        if(add_event($_POST) > 0){
            echo "
            <script>
                alert('Data berhasil ditambah')
                document.location.href = 'index.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal ditambah')
                document.location.href = 'add_event.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add Event</title>
</head>
<body>
    <!-- navbar -->
    <div class="nbar sticky-top">
        <h4 class="logotext"><img src="img/Halo.png" class="logo">Buru<span style="color: white;">Aka</span></h4>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="characters.php">Characters</a></li>
            <li><a href="tierlist.php">Tier List</a></li>
            <?php 
                if($is_login === true){
            ?>
            <li><a href="logout.php">Logout</a></li>
            <?php 
                }
            ?>
        </ul>
    </div>

    <div class="addevent">
        <h2>Add Event</h2>
        <br><br>

        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-2 pt-3 row">
                    <label for="Current" class="col-sm-2 col-form-label">Current</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="current" required>
                            <option value="" selected disabled>Select Current</option>
                            <option value="Event">Event</option>
                            <option value="Raid Boss">Raid Boss</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="Image" name="image" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Judul" name="judul" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Tanggal" name="tanggal" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Add Event</button>
                <a href="index.php" class="btn btn-danger mb-3">Back</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>