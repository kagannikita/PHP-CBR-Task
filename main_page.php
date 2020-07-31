<?php
require "includes/db.php";
require "includes/db_1.php";
 if(isset($_SESSION['logged_user'])): ?>
     Вы вошли как <?php echo $_SESSION['logged_user']->login;?><br><a href="logout.php">Выйти</a>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вывод курса валют</title>
</head>
<body>
<div class="filter"></div>
<div class="container">
    <h1>Вывод курса валют</h1>
 <form action="display.php" method="post">
     <label>Дата</label><br>
<select name="date">
    <option></option>
    <?php
    $result=mysqli_query($connection,"select distinct date from currency");
    while($myrow=mysqli_fetch_array($result)){
        echo "<option value=".$myrow['date'].">".$myrow['date']."</option>";
    }
    ?>
</select><br>
     <div style="margin-top: 1%">
     <button type="submit" name="display">Отобразить</button>
     </div>
 </form>
</div>
</body>
</html>
<?php else: header("Location:login.php") ?>
    <a href="login.php">Вход</a>
<?php endif ?>



