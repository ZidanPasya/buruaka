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

    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM chara WHERE id = $id");
    $data = mysqli_fetch_array($sql);

    $school_options = array("Abydos", "Arius", "Gehenna", "Hyakkiyako", "Milenium", "Red Winter", "Shanhaijing", "SRT", "Trinity", "Valkyrie");
    $school_club_options = array("Foreclosure Task Force", "Pandemonium Society", "Prefect Team", "Problem Solver 68", "Gourmet Research Society", "School Lunch Club", "Emergency Medicine Club");
    $rarity_options = array("1", "2", "3");
    $role_options = array("Attacker", "Healer", "Support", "Tactical Support", "Tank");
    $position_options = array("Back", "Front", "Middle");
    $attack_type_options = array("Explosive", "Mystic", "Penetration");
    $armor_type_options = array("Light", "Heavy", "Special");
    $combat_class_options = array("Special", "Striker");
    $weapon_type_options = array("AR", "FT", "GL", "HG", "MG", "MT", "RG", "RL", "SG", "SMG", "SR");
    $urban_options = array("B", "A", "S");
    $outdoor_options = array("B", "A", "S");
    $indoor_options = array("B", "A", "S");
    $tier_list_options = array("S+", "S", "A", "B", "C", "D");

    if(isset($_POST["submit"])){
        if(edit_chara($_POST) >= 0){
            echo "
            <script>
                alert('Data berhasil diedit')
                document.location.href = 'characters.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal diedit')
                document.location.href = 'characters.php';
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
    <title>Edit Character</title>
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

    <div class="addchara">
        <h2>Edit Character</h2>
        <br><br>

        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                <input type="hidden" name="oldIcon" value="<?php echo $data['fotoicon']; ?>">
                <input type="hidden" name="oldPortrait" value="<?php echo $data['fotoportrait']; ?>">

                <div class="mb-3 row">
                    <label for="FotoIcon" class="col-sm-2 col-form-label">Icon Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="Fotoicon" name="fotoicon">
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Fotoportrait" class="col-sm-2 col-form-label">Portrait Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="Fotoportrait" name="fotoportrait">
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Name" name="name" value="<?php echo $data["nama"]; ?>" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Fullname" name="fullname" value="<?php echo $data["fullname"]; ?>" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="School" class="col-sm-2 col-form-label">School</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="school" required>
                            <?php 
                                foreach($school_options as $sopti){
                                    if($data['school'] == $sopti){
                                        echo "<option selected value='$sopti'>$sopti</option>";
                                    }
                                    else{
                                        echo "<option value='$sopti'>$sopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Schoolclub" class="col-sm-2 col-form-label">School Club</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="schoolclub" required>
                            <?php 
                                foreach($school_club_options as $scopti){
                                    if($data['schoolclub'] == $scopti){
                                        echo "<option selected value='$scopti'>$scopti</option>";
                                    }
                                    else{
                                        echo "<option value='$scopti'>$scopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Releasedate" class="col-sm-2 col-form-label">Release Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="Releasedate" name="releasedate" value="<?php echo $data["releasedate"]; ?>" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Va" class="col-sm-2 col-form-label">Voice Actor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Va" name="va" value="<?php echo $data["va"]; ?>" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Rarity" class="col-sm-2 col-form-label">Rarity</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="rarity" required>
                            <?php 
                                foreach($rarity_options as $ropti){
                                    if($data['rarity'] == $ropti){
                                        echo "<option selected value='$ropti'>$ropti</option>";
                                    }
                                    else{
                                        echo "<option value='$ropti'>$ropti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="role" required>
                            <?php 
                                foreach($role_options as $roopti){
                                    if($data['role'] == $roopti){
                                        echo "<option selected value='$roopti'>$roopti</option>";
                                    }
                                    else{
                                        echo "<option value='$roopti'>$roopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Position" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="position" required>
                            <?php 
                                foreach($position_options as $popti){
                                    if($data['position'] == $popti){
                                        echo "<option selected value='$popti'>$popti</option>";
                                    }
                                    else{
                                        echo "<option value='$popti'>$popti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Atktype" class="col-sm-2 col-form-label">Attack Type</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="atktype" required>
                            <?php 
                                foreach($attack_type_options as $atopti){
                                    if($data['atktype'] == $atopti){
                                        echo "<option selected value='$atopti'>$atopti</option>";
                                    }
                                    else{
                                        echo "<option value='$atopti'>$atopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Armortype" class="col-sm-2 col-form-label">Armor Type</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="armortype" required>
                            <?php 
                                foreach($armor_type_options as $atyopti){
                                    if($data['armortype'] == $atyopti){
                                        echo "<option selected value='$atyopti'>$atyopti</option>";
                                    }
                                    else{
                                        echo "<option value='$scopti'>$atyopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Combatclass" class="col-sm-2 col-form-label">Combat Class</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="combatclass" required>
                            <?php 
                                foreach($combat_class_options as $ccopti){
                                    if($data['combatclass'] == $ccopti){
                                        echo "<option selected value='$ccopti'>$ccopti</option>";
                                    }
                                    else{
                                        echo "<option value='$ccopti'>$ccopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Weapontype" class="col-sm-2 col-form-label">Weapon Type</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="weapontype" required>
                            <?php 
                                foreach($weapon_type_options as $wtopti){
                                    if($data['weapontype'] == $wtopti){
                                        echo "<option selected value='$wtopti'>$wtopti</option>";
                                    }
                                    else{
                                        echo "<option value='$wtopti'>$wtopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Urban" class="col-sm-2 col-form-label">Urban</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="urban" required>
                            <?php 
                                foreach($urban_options as $uopti){
                                    if($data['urban'] == $uopti){
                                        echo "<option selected value='$uopti'>$uopti</option>";
                                    }
                                    else{
                                        echo "<option value='$uopti'>$uopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Outdoor" class="col-sm-2 col-form-label">Outdoor</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="outdoor" required>
                            <?php 
                                foreach($outdoor_options as $oopti){
                                    if($data['outdoor'] == $oopti){
                                        echo "<option selected value='$oopti'>$oopti</option>";
                                    }
                                    else{
                                        echo "<option value='$oopti'>$oopti</option>";
                                    }
                                }
                            ?>  
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Indoor" class="col-sm-2 col-form-label">Indoor</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="indoor" required>
                            <?php 
                                foreach($indoor_options as $iopti){
                                    if($data['indoor'] == $iopti){
                                        echo "<option selected value='$iopti'>$iopti</option>";
                                    }
                                    else{
                                        echo "<option value='$iopti'>$iopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tierlist" class="col-sm-2 col-form-label">Tier List</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="tierlist" required>
                            <?php 
                                foreach($tier_list_options as $tlopti){
                                    if($data['tierlist'] == $tlopti){
                                        echo "<option selected value='$tlopti'>$tlopti</option>";
                                    }
                                    else{
                                        echo "<option value='$tlopti'>$tlopti</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Edit Character</button>
                <a href="characters.php" class="btn btn-danger mb-3">Back</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>