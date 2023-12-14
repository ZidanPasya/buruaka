<?php 
    session_start();

    if(!isset($_SESSION["login"])){ // cek apakah user telah login
        // jika kondisi terpenuhi maka user diarahkan ke index
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
        if(add_chara($_POST) > 0){
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
                document.location.href = 'add_chara.php';
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
    <title>Add Character</title>
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
        <h2>Add Character</h2>
        <br><br>

        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="FotoIcon" class="col-sm-2 col-form-label">Icon Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="Fotoicon" name="fotoicon" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Fotoportrait" class="col-sm-2 col-form-label">Portrait Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="Fotoportrait" name="fotoportrait" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Name" name="name" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Fullname" name="fullname" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="School" class="col-sm-2 col-form-label">School</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="school" required>
                            <option value="" selected disabled>Select School</option>
                            <option value="Abydos">Abydos</option>
                            <option value="Arius">Arius</option>
                            <option value="Gehenna">Gehenna</option>
                            <option value="Hyakkiyako">Hyakkiyako</option>
                            <option value="Milennium">Milennium</option>
                            <option value="Red Winter">Red Winter</option>
                            <option value="Shanhaijing">Shanhaijing</option>
                            <option value="SRT">SRT</option>
                            <option value="Trinity">Trinity</option>
                            <option value="Valkyrie">Valkyrie</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Schoolclub" class="col-sm-2 col-form-label">School Club</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="schoolclub" required>
                            <option value="" selected disabled>Select School Club</option>
                            <option value="Foreclosure Task Force">Foreclosure Task Force</option>
                            <option value="Pandemonium Society">Pandemonium Society</option>
                            <option value="Prefect Team">Prefect Team</option>
                            <option value="Problem Solver 68">Problem Solver 68</option>
                            <option value="Gourmet Research Society">Gourmet Research Society</option>
                            <option value="School Lunch Club">School Lunch Club</option>
                            <option value="Emergency Medicine Club">Emergency Medicine Club</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Releasedate" class="col-sm-2 col-form-label">Release Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="Releasedate" name="releasedate" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Va" class="col-sm-2 col-form-label">Voice Actor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Va" name="va" required>
                    </div>
                </div>
                <div class="mb-3 pt-3 row">
                    <label for="Rarity" class="col-sm-2 col-form-label">Rarity</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="rarity" required>
                            <option value="" selected disabled>Select Rarity</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="role" required>
                            <option value="" selected disabled>Select Role</option>
                            <option value="Attacker">Attacker</option>
                            <option value="Healer">Healer</option>
                            <option value="Support">Support</option>
                            <option value="Tactical Support">Tactical Support</option>
                            <option value="Tank">Tank</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Position" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="position" required>
                            <option value="" selected disabled>Select Position</option>
                            <option value="Back">Back</option>
                            <option value="Front">Front</option>
                            <option value="Middle">Middle</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Atktype" class="col-sm-2 col-form-label">Attack Type</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="atktype" required>
                            <option value="" selected disabled>Select Attack Type</option>
                            <option value="Explosive">Explosive</option>
                            <option value="Mystic">Mystic</option>
                            <option value="Penetration">Penetration</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Armortype" class="col-sm-2 col-form-label">Armor Type</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="armortype" required>
                            <option value="" selected disabled>Select Armor Type</option>
                            <option value="Light">Light</option>
                            <option value="Heavy">Heavy</option>
                            <option value="Special">Special</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Combatclass" class="col-sm-2 col-form-label">Combat Class</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="combatclass" required>
                            <option value="" selected disabled>Select Combat Class</option>
                            <option value="Special">Special</option>
                            <option value="Striker">Striker</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Weapontype" class="col-sm-2 col-form-label">Weapon Type</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="weapontype" required>
                            <option value="" selected disabled>Select Weapon Type</option>
                            <option value="AR">AR</option>
                            <option value="FT">FT</option>
                            <option value="GL">GL</option>
                            <option value="HG">HG</option>
                            <option value="MG">MG</option>
                            <option value="MT">MT</option>
                            <option value="RG">RG</option>
                            <option value="RL">RL</option>
                            <option value="SG">SG</option>
                            <option value="SMG">SMG</option>
                            <option value="SR">SR</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Urban" class="col-sm-2 col-form-label">Urban</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="urban" required>
                            <option value="" selected disabled>Select Urban</option>
                            <option value="B">B</option>
                            <option value="A">A</option>
                            <option value="S">S</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Outdoor" class="col-sm-2 col-form-label">Outdoor</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="outdoor" required>
                            <option value="" selected disabled>Select Outdoor</option>
                            <option value="B">B</option>
                            <option value="A">A</option>
                            <option value="S">S</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Indoor" class="col-sm-2 col-form-label">Indoor</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="indoor" required>
                            <option value="" selected disabled>Select Indoor</option>
                            <option value="B">B</option>
                            <option value="A">A</option>
                            <option value="S">S</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tierlist" class="col-sm-2 col-form-label">Tier List</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="tierlist" required>
                            <option value="" selected disabled>Select Tier List</option>
                            <option value="S+">S+</option>
                            <option value="S">S</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Add Character</button>
                <a href="characters.php" class="btn btn-danger mb-3">Back</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>