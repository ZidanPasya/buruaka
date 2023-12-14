<?php 
    session_start();

    require "function.php";

    $query_chara = mysqli_query($conn, "SELECT * FROM chara");

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
    <title>Tier List</title>
</head>
<body>
    <!-- navbar -->
    <div class="nbar sticky-top">
        <h4 class="logotext"><img src="img/Halo.png" class="logo">Buru<span style="color: white;">Aka</span></h4>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="characters.php">Characters</a></li>
            <li><a class="active" href="tierlist.php">Tier List</a></li>
            <?php 
                if($is_login === true){
            ?>
            <li><a href="logout.php">Logout</a></li>
            <?php 
                }
            ?>
        </ul>
    </div>

    <div class="tierlist">
        <h4>Tier List</h4>
        <div class="tier">
            <?php 
                $tiers = array("S+", "S", "A", "B", "C", "D");
                foreach($tiers as $tier){
                    mysqli_data_seek($query_chara, 0); // mereset pointer menjadi 0
            ?>
            <div class="row g-0">
                <div class="label" style="background-color: <?php 
                                                                if($tier == "S+"){
                                                                    echo "#ec6563;";
                                                                }
                                                                if($tier == "S"){
                                                                    echo "#ff7f7f;";
                                                                }
                                                                if($tier == "A"){
                                                                    echo "#f9a2a2;";
                                                                }
                                                                if($tier == "B"){
                                                                    echo "#ffbf7f;";
                                                                }
                                                                if($tier == "C"){
                                                                    echo "#ffff7f;";
                                                                }
                                                                if($tier == "D"){
                                                                    echo "#bfff7f;";
                                                                }
                                                            ?>"><?php echo $tier; ?></div>
                <div class="charatier">
                <?php 
                    while($data_chara = mysqli_fetch_array($query_chara)){
                        if($data_chara['tierlist'] == $tier){
                ?>
                    <img src="img/character/icon/<?php echo $data_chara['fotoicon'] ?>" class="icon">
                <?php 
                        }
                    }
                ?>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>