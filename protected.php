<html>

<head>
    <title>Tartu Voco Website</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<?php
session_start();
if ($_SESSION['name']) {
} else {
    header("location: index.html");
}
$name = $_SESSION['name'];
?>

<body>
    <div class="content">
        <div class="header">
            <h2>Protected Page</h2>
        </div>
        <label>Hello,
            <?php print "$name" ?>!
        </label>
        <button class="logout-button" onclick='window.location.href="logic/logout.php"'>
            Click here to logout
        </button>
    </div>
</body>

</html>