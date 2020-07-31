<?php
require "includes/db.php";
$data=$_POST;
if(isset($data['do_login'])) {
    $errors = array();
    $user = R::findOne('admin', 'login=?', array($data['login']));
    if ($user) {
        if (password_verify($data['password'], $user->password)
        ) {
            $_SESSION['logged_user']=$user;
            header('Location:main_page.php');
        } else {
            $errors[] = 'Пароль неверный';
        }
    } else {
        $errors[] = 'Пользователь с таким логином не найден';
    }
    if (!empty($errors)) {
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
</head>
<body>
<div class="filter"></div>
<div class="container">
    <h1>Вход</h1>
    <form action="login.php" method="POST">
        <label>Пользователь</label><br>
        <input type="text" name="login" value="<?php echo @$data['login'];?>"><br>
        <label>Пароль</label><br>
        <input type="password" name="password" value="<?php echo @$data['password'];?>"><br>
        <button type="submit" name="do_login">Вход</button>
        <a href="signup.php">Если  не зарегистрированы</a>
    </form>
</div>
</body>
</html>