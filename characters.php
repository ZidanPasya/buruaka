<?php 
    session_start();

    include "function.php";

    $query_chara = mysqli_query($conn, "SELECT * FROM chara"); //mengambil isi dari tabel chara

    if(isset($_SESSION["login"]) === true){ //cek apakah user melakukan login
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
    <title>Characters</title>
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
                // memnuculkan tombol logout jika user telah login
                if($is_login === true){
            ?>
            <li><a href="logout.php">Logout</a></li>
            <?php 
                }
            ?>
        </ul>
    </div>

    <!-- character list -->
    <div class="character">
        <div class="topbar">
            <h4>Characters</h4>
            <?php 
                if($is_login === true){
            ?>
            <a class="btn btn-primary p-2 mx-3 my-auto add" href="add_chara.php" role="button">Add Character</a>
            <?php 
                }
            ?>
        </div>
        <!-- <h4>Characters</h4> -->
        <!-- filter -->
        <div class="container">
            <!-- berdasarkan rarity -->
            <div class="rarity">
                <section class="type">
                    <ul>
                        <li class="active" data-filter="all"><img src="img/asterisk.png" class="star-image"></li>
                        <li data-filter="1"><img src="img/star.png" class="star-image"></li>
                        <li data-filter="2"><img src="img/star.png" class="star-image"><img src="img/star.png" class="star-image" style="margin-left: -17px;"></li>
                        <li data-filter="3"><img src="img/star.png" class="star-image"><img src="img/star.png" class="star-image" style="margin-left: -17px;"><img src="img/star.png" class="star-image" style="margin-left: -17px;"></li>
                    </ul>
                </section>
            </div>
            <!-- berdasarkan role -->
            <div class="role">
                <section class="type">
                    <ul>
                        <li class="active" data-filter="all"><img src="img/asterisk.png" class="star-image"></li>
                        <li data-filter="Striker" style="padding-top: 5px;">Striker</li>
                        <li data-filter="Special" style="padding-top: 5px;">Special</li>
                    </ul>
                </section>
            </div>
            <!-- berdasarkan class -->
            <div class="class">
                <section class="type">
                    <ul>
                        <li class="active" data-filter="all"><img src="img/asterisk.png" class="star-image"></li>
                        <li data-filter="Attacker"><img src="img/class/attacker.jpg" class="class-image"></li>
                        <li data-filter="Healer"><img src="img/class/healer.jpg" class="class-image"></li>
                        <li data-filter="Support"><img src="img/class/supporter.jpg" class="class-image"></li>
                        <li data-filter="Tactical Support"><img src="img/class/tactical.jpg" class="class-image"></li>
                        <li data-filter="Tank"><img src="img/class/tank.jpg" class="class-image"></li>
                    </ul>
                </section>
            </div>
            <!-- berdasarkan atk type -->
            <div class="atktype">
                <section class="type">
                    <ul>
                        <li class="active" data-filter="all"><img src="img/asterisk.png" class="star-image"></li>
                        <li data-filter="Explosive" style="padding-top: 5px;">Explosive</li>
                        <li data-filter="Penetration" style="padding-top: 5px;">Penetration</li>
                        <li data-filter="Mystic" style="padding-top: 5px;">Mystic</li>
                    </ul>
                </section>
            </div>
        </div>
        <!-- list character -->
        <div class="chara">
            <?php 
                while($data_chara = mysqli_fetch_array($query_chara)){
            ?>
            <!-- menampilkan character berdasarkan filter yg tersedia -->
            <div class="char" data-rarity="<?php echo $data_chara['rarity']; ?>" data-role="<?php echo $data_chara['combatclass']; ?>" data-class="<?php echo $data_chara['role']; ?>" data-atktype="<?php echo $data_chara['atktype']; ?>">
                <?php 
                    // menampilkan fitur edit dan hapus jika user login
                    if($is_login === true){
                ?>
                <a class="tombol" href="edit_chara.php?id=<?php echo $data_chara['id']; ?>" style="margin-right: 68px; padding: 4px; border-radius: 10px; background-color: #ffff00;"><img src="img/edit.png" width="100%"></a>
                <a class="tombol" href="delete_chara.php?id=<?php echo $data_chara['id']; ?>" style="right: 0; padding: 4px; border-radius: 10px; background-color: #ff0000;"  onclick="return confirm('Anda yakin ingin menghapus data ini?')"><img src="img/delete.png" width="100%"></a>
                <?php 
                    }
                ?>
                <!-- menampilkan icon character dan jika diklik akan mengarah ke info dari character tersebut -->
                <a href="charainfo.php?id=<?php echo $data_chara['id']; ?>">
                    <img src="img/character/icon/<?php echo $data_chara['fotoicon']; ?>" class="chara-image">
                    <h6><?php echo $data_chara['nama']; ?></h6>
                </a>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    <!-- function js yg digunakan -->
    <script>
    
    // deklarasi untuk mendapatkan item
    const rarityItem = document.querySelectorAll('.rarity .type ul li');
    const roleItem = document.querySelectorAll('.role .type ul li');
    const classItem = document.querySelectorAll('.class .type ul li');
    const atktypeItem = document.querySelectorAll('.atktype .type ul li');
    const divItem = document.querySelectorAll('.chara div');

    // Function untuk melakukan filtering berdasarkan rarity, role, class, dan atktype
    function filterCharacters() {
        const selectedRarity = document.querySelector('.rarity .type ul li.active').getAttribute('data-filter');
        const selectedRole = document.querySelector('.role .type ul li.active').getAttribute('data-filter');
        const selectedClass = document.querySelector('.class .type ul li.active').getAttribute('data-filter');
        const selectedAtkType = document.querySelector('.atktype .type ul li.active').getAttribute('data-filter');

        divItem.forEach(div => {
            const rarity = div.getAttribute('data-rarity');
            const role = div.getAttribute('data-role');
            const kelas = div.getAttribute('data-class');
            const atktype = div.getAttribute('data-atktype');

            div.style.display = 'none';

            if ((selectedRarity === 'all' || rarity === selectedRarity) 
                && (selectedRole === 'all' || role === selectedRole) &&
                (selectedClass === 'all' || kelas === selectedClass) &&
                (selectedAtkType === 'all' || atktype === selectedAtkType)) {
                div.style.display = 'block';
            }
        });
    }

    // Function untuk menggeser class active dalam class rarity 
    rarityItem.forEach(li => {
        li.onclick = function() {
            rarityItem.forEach(li => {
                li.className = '';
            });
            li.className = 'active';
            filterCharacters();
        };
    });

    // Function untuk menggeser class active dalam class role
    roleItem.forEach(li => {
        li.onclick = function() {
            roleItem.forEach(li => {
                li.className = '';
            });
            li.className = 'active';
            filterCharacters();
        };
    });

    // Function untuk menggeser class active dalam class class
    classItem.forEach(li => {
        li.onclick = function() {
            classItem.forEach(li => {
                li.className = '';
            });
            li.className = 'active';
            filterCharacters();
        };
    });

    // Function untuk menggeser class active dalam class atk type
    atktypeItem.forEach(li => {
        li.onclick = function() {
            atktypeItem.forEach(li => {
                li.className = '';
            });
            li.className = 'active';
            filterCharacters();
        };
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>