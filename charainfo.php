<?php 
    session_start();

    require "function.php";

    if(isset($_SESSION["login"]) === true){
        $is_login = true;
    }
    else {
        $is_login = false;
    }

    $id = $_GET['id'];
    $query_chara = mysqli_query($conn, "SELECT * FROM chara WHERE id=$id");
    $data_chara = mysqli_fetch_array($query_chara);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $data_chara['fullname'] ?></title>
</head>
<body>
    <!-- navbar -->
    <div class="nbar sticky-top">
        <h4 class="logotext"><img src="img/Halo.png" class="logo">Buru<span style="color: white;">Aka</span></h4>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="characters.php">Characters</a></li>
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

    <!-- character info -->
    <div class="info">
        <div class="chara-card">
            <!-- character name -->
            <h3><?php echo $data_chara['fullname']; ?></h3>
            <div class="chara-info">
                <!-- character image -->
                <img src="img/character/portrait/<?php echo $data_chara['fotoportrait']; ?>" alt="" class="chara-image">
                <h4>Character Profile</h4>
                <div class="information">
                    <div class="left">
                        <!-- Personal Information -->
                        <div class="personal">
                            <h5>Personal Information</h5>
                            <table class="style">
                                <tr>
                                    <td>Name</td>
                                    <th><?php echo $data_chara['nama']; ?></th>
                                </tr>
                                <tr>
                                    <td>Fullname</td>
                                    <th><?php echo $data_chara['fullname']; ?></th>
                                </tr>
                                <tr>
                                    <td>School</td>
                                    <th><?php echo $data_chara['school']; ?></th>
                                </tr>
                                <tr>
                                    <td>School Club</td>
                                    <th><?php echo $data_chara['schoolclub']; ?></th>
                                </tr>
                                <tr>
                                    <td>Release Date</td>
                                    <th>
                                        <?php 
                                            $releaseDate = $data_chara['releasedate']; 
                                            $formatDate = date("j F Y", strtotime($releaseDate));
                                            echo $formatDate;
                                        ?>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <!-- VA Information -->
                        <div class="va">
                            <h5>VA Information</h5>
                            <table class="style">
                                <tr>
                                    <td>VA (JPN)</td>
                                    <th><?php echo $data_chara['va']; ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Combat Information -->
                    <div class="combat">
                        <h5>Combat Information</h5>
                        <table class="style">
                            <tr>
                                <td>Rarity</td>
                                <th><?php echo $data_chara['rarity']; ?> Star</th>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <th><?php echo $data_chara['role']; ?></th>
                            </tr>
                            <tr>
                                <td>Position</td>
                                <th><?php echo $data_chara['position']; ?></th>
                            </tr>
                            <tr>
                                <td>Attack Type</td>
                                <th><?php echo $data_chara['atktype']; ?></th>
                            </tr>
                            <tr>
                                <td>Armor Type</td>
                                <th><?php echo $data_chara['armortype']; ?></th>
                            </tr>
                            <tr>
                                <td>Combat Class</td>
                                <th><?php echo $data_chara['combatclass']; ?></th>
                            </tr>
                            <tr>
                                <td>Weapon Type</td>
                                <th><?php echo $data_chara['weapontype']; ?></th>
                            </tr>
                            <tr>
                                <td>Urban Field</td>
                                <th><?php echo $data_chara['urban']; ?></th>
                            </tr>
                            <tr>
                                <td>Outdoor Field</td>
                                <th><?php echo $data_chara['outdoor']; ?></th>
                            </tr>
                            <tr>
                                <td>Indoor Field</td>
                                <th><?php echo $data_chara['indoor']; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>