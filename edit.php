<?php
// include database connection file
include_once("config.php");
 
//check sudah login / belom
session_start();

if($_SESSION['isLogin']==''){
    header("Location: login.php");
    echo "anda belum login";
}

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
        $id = $_POST['id'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',role ='$role',mobile='$mobile',password='$password',alamat='$alamat' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
        $name = $user_data['name'];
        $email = $user_data['email'];
        $role = $user_data['role'];
        $mobile = $user_data['mobile'];
        $password = $user_data['password'];
        $alamat = $user_data['alamat'];
        
}
?>
<html>

<head>
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="p-3">
        <h1>Edit Pengguna</h1>
        <form name="update_user" method="post" action="edit.php">

            <div class="w-100">
                <p>Nama</p>
                <input class="form-control" type="text" name="name" value=<?php echo $name;?>>
            </div>

            <div class="w-100 row pt-3">
                <div class="w-50">
                    <p>Pilih Role Pengguna</p>
                    <select class="form-select" id="inputGroupSelect01" name="role">
                        <option value="Admin">Admin</option>
                        <option value="Non-Admin">Non-Admin</option>
                    </select>
                </div>

                <div class="w-50">
                    <p>Email</p>
                    <input class="form-control col" type="text" name="email" value=<?php echo $email;?>>
                </div>
            </div>
            <div class="w-100 row pt-3">

                <div class="w-50">
                    <p>Password - isikan password lagi</p>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="w-50">
                    <p>Telp</p>
                    <input class="form-control" type="text" name="mobile" value=<?php echo $mobile;?>>
                </div>
            </div>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            <br>
            <div class="w-100">
                <p>Alamat Lengkap</p>
                <textarea class="form-control" aria-label="With textarea" name="alamat"><?php echo $alamat;?></textarea>
            </div>
            <br>
            <div class="column">
                <input class="btn btn-secondary btn-sm" type="submit" name="update" value="Update">
                <a class="btn btn-secondary btn-sm" href="index.php">Back</a>
            </div>
        </form>

    </div>

</body>

</html>