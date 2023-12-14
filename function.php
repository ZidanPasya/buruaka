<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "bluearchive";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    function register($data){
        global $conn;

        $username = strtolower(stripslashes($data['username']));
        $password = mysqli_real_escape_string($conn, $data['password']);
        $confirmpassword = mysqli_real_escape_string($conn, $data['confirmpassword']);

        if($password !== $confirmpassword){
            echo "<script>
                    alert('Password tidak sesuai');
                  </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO user(id, username, password) VALUES(NULL, '$username', '$password')");
    }

    function add_event($data){
        global $conn;

        $current = $data['current'];
        $image = upload_event();
        $judul = $data['judul'];
        $tanggal = $data['tanggal'];

        $sql = "INSERT INTO event (id, current, foto, judul, tanggal) VALUES (NULL, '$current', '$image', '$judul', '$tanggal')";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    function edit_event($data){
        global $conn;

        $id = $data['id'];
        $pilih = mysqli_query($conn, "SELECT * FROM event WHERE id=$id");
        $datas = mysqli_fetch_array($pilih);
        $foto = $datas['foto'];
        $current = $data['current'];
        $oldImage = $data['oldImage'];
        if($_FILES['image']['error'] === 4){
            $image = $oldImage;
        }
        else {
            unlink("img/event/$foto");
            $image = upload_event();
        }
        $judul = $data['zidan'];
        $tanggal = $data['tanggal'];

        $sql = "UPDATE event SET
                id = $id,
                current = '$current',
                foto = '$image',
                judul = '$judul',
                tanggal = '$tanggal'
                WHERE id = '$id'";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    function delete_event($id){
        global $conn;

        $sql = mysqli_query($conn, "SELECT * FROM event WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        $image = $data['foto'];
        unlink("img/event/$image");
        mysqli_query($conn, "DELETE FROM event WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function add_gacha($data){
        global $conn;

        $image = upload_gacha();
        $banner = $data['banner'];
        $tanggal = $data['tanggal'];

        $sql = "INSERT INTO gacha (id, foto, banner, tanggal) VALUES (NULL, '$image', '$banner', '$tanggal')";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    function edit_gacha($data){
        global $conn;

        $id = $data['id'];
        $pilih = mysqli_query($conn, "SELECT * FROM gacha WHERE id=$id");
        $datas = mysqli_fetch_array($pilih);
        $foto = $datas['foto'];
        $oldImage = $data['oldImage'];
        if($_FILES['image']['error'] === 4){
            $image = $oldImage;
        }
        else {
            unlink("img/gacha/$foto");
            $image = upload_gacha();
        }
        $banner = $data['banner'];
        $tanggal = $data['tanggal'];

        $sql = "UPDATE gacha SET
                id = $id,
                foto = '$image',
                banner = '$banner',
                tanggal = '$tanggal'
                WHERE id = '$id'";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    function delete_gacha($id){
        global $conn;

        $sql = mysqli_query($conn, "SELECT * FROM gacha WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        $image = $data['foto'];
        unlink("img/gacha/$image");
        mysqli_query($conn, "DELETE FROM gacha WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function add_chara($data){
        global $conn;

        $fotoicon = upload_icon();
        $fotoportrait = upload_portrait();
        $nama = $data['name'];
        $fullname = $data['fullname'];
        $school = $data['school'];
        $schoolclub = $data['schoolclub'];
        $releasedate = $data['releasedate'];
        $va = $data['va'];
        $rarity = $data['rarity'];
        $role = $data['role'];
        $position = $data['position'];
        $atktype = $data['atktype'];
        $armortype = $data['armortype'];
        $combatclass = $data['combatclass'];
        $weapontype = $data['weapontype'];
        $urban = $data['urban'];
        $outdoor = $data['outdoor'];
        $indoor = $data['indoor'];
        $tierlist = $data['tierlist'];

        $sql = "INSERT INTO chara (id, fotoicon, fotoportrait, nama, fullname, school, schoolclub, releasedate,
                                    va, rarity, role, position, atktype, armortype, combatclass, weapontype,
                                    urban, outdoor, indoor, tierlist) VALUES (NULL, '$fotoicon', '$fotoportrait',
                                    '$nama', '$fullname', '$school', '$schoolclub', '$releasedate', '$va',
                                    '$rarity', '$role', '$position', '$atktype', '$armortype', '$combatclass',
                                    '$weapontype', '$urban', '$outdoor', '$indoor', '$tierlist')";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn); 
    }

    function edit_chara($data){
        global $conn;

        $id = $data['id'];
        $pilih = mysqli_query($conn, "SELECT * FROM chara WHERE id=$id");
        $datas = mysqli_fetch_array($pilih);

        $fotoicon = $datas['fotoicon'];
        $fotoportrait = $datas['fotoportrait'];
        $oldIcon = $data['oldIcon'];
        $oldPortrait = $data['oldPortrait'];
        if($_FILES['fotoicon']['error'] === 4){
            $fotoicon = $oldIcon;
        }
        else {
            unlink("img/character/icon/$fotoicon");
            $fotoicon = upload_icon();
        }
        if($_FILES['fotoicon']['error'] === 4){
            $fotoportrait = $oldPortrait;
        }
        else {
            unlink("img/character/portrait/$fotoicon");
            $fotoportrait = upload_portrait();
        }
        $nama = $data['name'];
        $fullname = $data['fullname'];
        $school = $data['school'];
        $schoolclub = $data['schoolclub'];
        $releasedate = $data['releasedate'];
        $va = $data['va'];
        $rarity = $data['rarity'];
        $role = $data['role'];
        $position = $data['position'];
        $atktype = $data['atktype'];
        $armortype = $data['armortype'];
        $combatclass = $data['combatclass'];
        $weapontype = $data['weapontype'];
        $urban = $data['urban'];
        $outdoor = $data['outdoor'];
        $indoor = $data['indoor'];
        $tierlist = $data['tierlist'];

        $sql = "UPDATE chara SET
                id = $id,
                fotoicon = '$fotoicon',
                fotoportrait = '$fotoportrait',
                nama = '$nama',
                fullname = '$fullname',
                school = '$school',
                schoolclub = '$schoolclub',
                releasedate = '$releasedate',
                va = '$va',
                rarity = '$rarity',
                role = '$role',
                position = '$position',
                atktype = '$atktype',
                armortype = '$armortype',
                combatclass = '$combatclass',
                weapontype = '$weapontype',
                urban = '$urban',
                outdoor = '$outdoor',
                indoor = '$indoor',
                tierlist = '$tierlist'
                WHERE id = '$id'";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn); 
    }

    function delete_chara($id){
        global $conn;

        $sql = mysqli_query($conn, "SELECT * FROM chara WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        $icon = $data['fotoicon'];
        $portrait = $data['fotoportrait'];
        unlink("img/character/icon/$icon");
        unlink("img/character/portrait/$portrait");
        mysqli_query($conn, "DELETE FROM chara WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function upload_event(){
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $fileName);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "
				<script>
					alert('Yang anda upload bukan gambar');
				</script>
			";
			return false;
		}

        $namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/event/' . $namaFileBaru);

		return $namaFileBaru;
    }

    function upload_gacha(){
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $fileName);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "
				<script>
					alert('Yang anda upload bukan gambar');
				</script>
			";
			return false;
		}

        $namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/gacha/' . $namaFileBaru);

		return $namaFileBaru;
    }

    function upload_icon(){
        $fileName = $_FILES['fotoicon']['name'];
        $tmpName = $_FILES['fotoicon']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $fileName);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "
				<script>
					alert('Yang anda upload bukan gambar');
				</script>
			";
			return false;
		}

        $namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/character/icon/' . $namaFileBaru);

		return $namaFileBaru;
    }

    function upload_portrait(){
        $fileName = $_FILES['fotoportrait']['name'];
        $tmpName = $_FILES['fotoportrait']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $fileName);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "
				<script>
					alert('Yang anda upload bukan gambar');
				</script>
			";
			return false;
		}

        $namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/character/portrait/' . $namaFileBaru);

		return $namaFileBaru;
    }
?>