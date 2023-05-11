<?php
session_start();

$_SESSION['isLogin']='';


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $pass = $_POST['password'];
    if($id = "12333" and $pass = "12345" ){
        $_SESSION['isLogin']='true';
        header("Location: index.php");
    }else{
        echo 'password atau id login salah';
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="login.php" method="POST" name="login_form">
        <div class="w-100 d-flex justify-content-center align-items-center rounded">
            <div class="row w-50 pt-5 border border-primary p-3 m-5 rounded-3 pb-5">
                <p class="d-flex justify-content-center">Login Page - Administrator Role</p>
                <p class="mt-3">Id - 12333</p>
                <input type="text" name="id" class="form-control w-100">
                <p class="mt-3">Password - 12345</p>
                <input type="password" name="password" class="form-control w-100">
                <input class="mt-5 justify-content-center" type="submit" name="submit" value="Login">
            </div>
        </div>
    </form>

</body>

</html>