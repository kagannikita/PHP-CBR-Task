<?php
require "includes/db.php";
$data=$_POST;
if(isset($data['do_signup']))
{
    $errors=array();
    if(trim($data['login'])==''){
        $errors[]='Enter login';
    }
    if($data['password']==''){
        $errors[]='Enter password';
    }
    if($data['password2']!=$data['password']){
        $errors[]='This password is false';
    }
    if(R::count('users',"login=?",array($data['login']))>0){
        $errors[]='User with this login  has yet';
    }
    if(empty($errors)){
        $user=R::dispense('admin');
        $user->login=$data['login'];
        $user->password=password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        header('Location:login.php');
    }
    else{
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
    <h1>Регистрация</h1>
    <form action="signup.php" method="POST">
        <label>Пользователь</label><br>
        <input type="text" name="login" value="<?php echo @$data['login'];?>"><br>
        <label>Пароль</label><br>
        <input type="password" name="password" value="<?php echo @$data['password'];?>"><br>
        <label>Потверждение пароля</label><br>
        <input type="password" name="password2" value="<?php echo @$data['password2'];?>"><br>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
        <a href="login.php">Если  зарегистрированы</a>
    </form>
</div>
</body>
</html>