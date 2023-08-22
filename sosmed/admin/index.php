<?php
include "../connection.php";
session_start();

// cek
if (!isset($_SESSION['logged-in'])) {
	header("Location: ../login.php");
	exit();
}
if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == "user") {
	header("Location: ../");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
</head>
<body>
	<a href="../php/logout.php">Logout</a>

	<h1>Control Panel</h1>

</body>
</html>