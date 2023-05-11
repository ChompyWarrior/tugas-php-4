<?php
// Create database connection using config file
include_once("config.php");
 
session_start();

if($_SESSION['isLogin']==''){
    header("Location: login.php");
    echo "anda belum login";
}else{
    echo "Welcome, Admin";
}


// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<title>Homepage</title>
</head>

<body>
    <br>
    <div class="m-3">
        <table class="ps-3" width='100%' border=1 class="w-100">

            <tr>
                <th class="ps-3">No</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
                <th>Role</th>
            </tr>
            <?php  
 while($user_data = mysqli_fetch_array($result)) {   
    ?>
            <tr>
                <td class="ps-3"><?= $user_data['id'] ?></td>
                <td><?= $user_data['name'] ?></td>
                <td><img class="pt-3 pb-3" src="gambar/<?=$user_data['gambar']?>" width="100"></td>
                <td><?= $user_data['mobile'] ?></td>
                <td><?= $user_data['email'] ?></td>
                <td><?= $user_data['role'] ?></td>

                <?php echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td>";?>
            </tr>
            <?php
    }
 ?>
        </table>
    </div>

    <br>
    <a class="btn btn-primary btn-sm ms-3" href="add.php">Add New User</a><br /><br />
</body>

<a class="btn btn-primary btn-sm ms-3" href="logout.php" class="btn">Logout</a>

</html>