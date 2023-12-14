<?php 
    session_start();

    include "function.php";

    $query_event = mysqli_query($conn, "SELECT * FROM event");
    $query_gacha = mysqli_query($conn, "SELECT * FROM gacha");

    if(isset($_SESSION["login"]) === true){
        $is_login = true;
    }
    else {
        $is_login = false;
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
    <title>Homepage</title>
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

    <!-- content home -->
    <div class="home">
        <div class="content">
            <h1>ALL ABOUT<span style="color: #1e90ff"> BLUE ARCHIVE</span></h1>
            <p>
                Wiki and Database for Blue Archive, a Nexon Games tactical fantasy RPG.<br>
                Check out our guides, character reviews, tier list and more!
            </p>
            <?php 
                if($is_login === false){
            ?>
            <div>
                <a href="register.php"><button type="button" class="register">Register</button></a>
                <a href="login.php"><button type="button" class="login">Login</button></a>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>

    <!-- current info -->
    <div class="nextcontent">
        <!-- current event -->
        <!-- <h4>Current Events</h4> -->
        <div class="topbar">
            <h4>Current Events</h4>
            <?php 
                if($is_login === true){
            ?>
            <a class="btn btn-primary p-2 mx-3 my-auto add" href="add_event.php" role="button">Add Event</a>
            <?php 
                }
            ?>
        </div>
        <section class="container">
            <!-- semua event -->
            <?php 
                while($data_event = mysqli_fetch_array($query_event)){
            ?>
            <div class="event">
                <?php 
                    if($is_login === true){
                ?>
                <a class="tombol" href="edit_event.php?id=<?php echo $data_event['id']; ?>" style="margin-right: 68px; padding: 4px; border-radius: 10px; background-color: #ffff00;"><img src="img/edit.png" width="100%"></a>
                <a class="tombol" href="delete_event.php?id=<?php echo $data_event['id']; ?>" style="right: 0; padding: 4px; border-radius: 10px; background-color: #ff0000;" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><img src="img/delete.png" width="100%"></a>
                <?php 
                    }
                ?>
                <h5>Current <?php echo $data_event['current']; ?></h5>
                <img src="img/event/<?php echo $data_event['foto']; ?>" class="card-image">
                <h6><?php echo $data_event['judul']; ?></h6>
                <p><?php echo $data_event['tanggal']; ?></p>
            </div>
            <?php 
                }
            ?>
        </section>

        <!-- current gacha -->
        <div class="botbar">
            <h4>Current Gacha</h4>
            <?php 
                if($is_login === true){
            ?>
            <a class="btn btn-primary p-2 mx-3 my-auto add" href="add_gacha.php" role="button">Add Gacha</a>
            <?php 
                }
            ?>
        </div>
        <section class="container" style="padding-bottom: 20px;">
            <!-- semua gacha -->
            <?php 
                while($data_gacha = mysqli_fetch_array($query_gacha)){
            ?>
            <div class="event">
                <?php 
                    if($is_login === true){
                ?>
                <a class="tombol" href="edit_gacha.php?id=<?php echo $data_gacha['id']; ?>" style="margin-right: 68px; padding: 4px; border-radius: 10px; background-color: #ffff00;"><img src="img/edit.png" width="100%"></a>
                <a class="tombol" href="delete_gacha.php?id=<?php echo $data_gacha['id']; ?>" style="right: 0; padding: 4px; border-radius: 10px; background-color: #ff0000;" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><img src="img/delete.png" width="100%"></a>
                <?php 
                    }
                ?>
                <h5>Current Gacha</h5>
                <img src="img/gacha/<?php echo $data_gacha['foto']; ?>" class="card-image">
                <h6><?php echo $data_gacha['banner']; ?></h6>
                <p><?php echo $data_gacha['tanggal']; ?></p>
            </div>
            <?php 
                }
            ?>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>