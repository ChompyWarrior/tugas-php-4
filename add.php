<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Users</title>
</head>

<body>
    <div class="p-3">
        <h1>Tambah Pengguna Baru</h1>
        <form name="update_user" method="post" action="add.php" enctype="multipart/form-data">

            <div class="w-100">
                <p>Nama</p>
                <input class="form-control" type="text" name="name">
            </div>

            <div class="w-100 row pt-3">
                <div class="w-50">
                    <p>Pilih Role Pengguna</p>
                    <select class="form-select" name="role" id="inputGroupSelect01">
                        <option value="Admin">Admin</option>
                        <option value="Non-Admin">Non-Admin</option>
                    </select>
                </div>

                <div class="w-50">
                    <p>Email</p>
                    <input class="form-control col" type="text" name="email">
                </div>
            </div>
            <div class="w-100 row pt-3">

                <div class="w-50">
                    <p>Password</p>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="w-50">
                    <p>Telp</p>
                    <input class="form-control" type="text" name="mobile">
                </div>
            </div>

            <br>
            <div class="w-100">
                <p>Alamat Lengkap</p>
                <textarea class="form-control" aria-label="With textarea" name="alamat"></textarea>
            </div>
            <br>
            <div class="input-group">
                <input type="file" class="form-control" name="filegambar">
            </div>
            <br>
            <div class="column">
                <input class="btn btn-secondary btn-sm" type="submit" name="Submit" value="Create">
                <a class="btn btn-secondary btn-sm" href="index.php">Back</a>
            </div>
        </form>

    </div>
    </form>
    <!-- <form name="update_user" method="post" action="add.php" enctype="multipart/form-data">

        <table width="25%" border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form> -->
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $alamat = $_POST['alamat'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table

        // Show message when user added

        $tempdir = "gambar/"; 
        if (!file_exists($tempdir))
        mkdir($tempdir,0755); 
        //gambar akan di simpan di folder gambar
        $target_path = $tempdir . basename($_FILES['filegambar']['name']);

        //nama gambar
        $nama_gambar=$_FILES['filegambar']['name'];
        //ukuran gambar
        $ukuran_gambar = $_FILES['filegambar']['size']; 

        $fileinfo = @getimagesize($_FILES["filegambar"]["tmp_name"]);
        //lebar gambar
        $width = $fileinfo[0];
        //tinggi gambar
        $height = $fileinfo[1]; 
        if($ukuran_gambar > 819200){ 
            echo 'Ukuran gambar melebihi 800kb';
        }else if ($width > "480" || $height > "640") {
             echo 'Ukuran gambar harus 480x640';
        }else{
            if (move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
                // $result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile,alamat,namaGambar,gambar) VALUES('$name','$email','$mobile','$alamat','".$_POST['nama']."', '".$nama_gambar."')");
        
                $result=mysqli_query($mysqli,"INSERT INTO users(name,email,role,mobile,password,alamat,namaGambar,gambar) VALUES('$name','$email','$role','$mobile','$password','$alamat','".$_POST['name']."', '".$nama_gambar."')");
                echo "User added successfully. <a href='index.php'>View Users</a>";

            } else {
                echo 'Simpan data gagal';
            }
        } 

    }
    ?>
</body>

</html>