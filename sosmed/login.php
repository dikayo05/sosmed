<?php
include "./connection.php";
session_start();

// cek
if (isset($_SESSION['logged-in'])) {
    if ($_SESSION['logged-in'] == "user") {
        header("Location: ./");
        exit();
    } else {
        header("Location: ./admin/");
        exit();
    }
}

// login
if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'");
    $check = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if ($check == 1) {
        if ($data['uid'] > 1) {
            $_SESSION['logged-in'] = "user";
            $_SESSION['uid'] = $data['uid'];
            header("Location: ./");
            exit();
        }
        $_SESSION['logged-in'] = "admin";
        header("Location: ./admin/");
        exit();
    } else {
        echo "<script>alert('username/password salah!')</script>";
    }
}

// signup
if (isset($_POST['sign-up'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO tbl_user (name,username,password) VALUES ('$fullname','$username','$password')");
    $query = mysqli_fetch_array(mysqli_query($conn, "SELECT uid FROM tbl_user WHERE username='$username' AND password='$password'"));

    if (!file_exists("./data/user/".$query['uid'])) {
        mkdir("./data/user/".$query['uid']."/img", recursive: true);
        mkdir("./data/user/".$query['uid']."/profile", recursive: true);
    }

    header("Location: ./login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
    <div class="main">      
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="post" action="">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="fullname" placeholder="Full Name" required="">
                <input type="text" name="username" placeholder="Username" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="sign-up">Sign Up</button>
            </form>
        </div>

        <div class="login">
            <form method="post" action="">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="username" placeholder="Username" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
