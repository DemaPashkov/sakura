<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKURA</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>
    <header class="pc">
        <img src="img/logo.svg" alt="logo" width="135px">
        <nav class="links">
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="service.php">Услуги</a></li>
                <li><a href="about-us.php">О компании</a></li>
                <li><a href="our-work.php">Наши работы</a></li>
                <li><a href="contact.php">Контакты</a></li>
                <?php 
        session_start();
        require_once('php/bd.php');
                   if (isset($_SESSION['login_user'] )) {
                    $user_check = $_SESSION['login_user'];
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user_check'");
                    $rows = mysqli_fetch_array($query);
                    $status = $rows['admin'];
                    $id_user = $rows['id_user'];
                    if($status ==1){
                        // header("Location: ../account/admin.php");
                        $admin = '<a href="account/admin.php">Личный кабинет</a>';
                    }else{
                        $admin = '<a href="account.php">Личный кабинет</a>';
                    }
                    
                    echo  $admin;
                   

                }  else{

                    echo '<div class="button"><a href="#">Личный кабинет</a></div>';
                }
                   ?>
               
            </ul>
        </nav>
    </header>

<div class="mob">
<heade class="mob"r>
	<div class="menu-btn">
		<span class="bar"></span>
		<span class="bar"></span>
		<span class="bar"></span>
	</div>
</heade>

<div class="header__nav">
	<nav class="nav">
    <ul class="nav__list">
      <li class="nav__list_item"><a class="nav__link" href="index.php">Главная</a></a></li>
      <li class="nav__list_item"><a class="nav__link" href="service.php">Услуги</a></li>
      <li class="nav__list_item"><a class="nav__link" href="about-us.php">О компании</a></li>
      <li class="nav__list_item"><a class="nav__link" href="our-work.php">Наши работы</a></li>
      <li class="nav__list_item"><a class="nav__link" href="contact.php">Контакты</a></li>
      <?php 
        session_start();
        require_once('php/bd.php');
                   if (isset($_SESSION['login_user'] )) {
                    $user_check = $_SESSION['login_user'];
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user_check'");
                    $rows = mysqli_fetch_array($query);
                    $status = $rows['admin'];
                    $id_user = $rows['id_user'];
                    if($status ==1){
                        // header("Location: ../account/admin.php");
                        $admin = '<li class="nav__list_item"><a class="nav__link button" href="account/admin.php">Личный кабинет</a></li>';
                    }else{
                        $admin = '<li class="nav__list_item"><a class="nav__link button" href="account.php">Личный кабинет</a></li>';
                    }
                    
                    echo  $admin;
                   

                }  else{

                    echo '<div class="button"><li class="nav__list_item"><a class="nav__link button" href="#">Личный кабинет</a></li></div>';
                }
                   ?>
    </ul>
	</nav>
</div>
</div>

    <!-- auth -->
    <div class="overlay">
		<div class="popup">
            <div class="bg">
			<h2 class="popup__h2">Авторизация</h2>
                <div class="inp flex">
                    <form action="php/login.php" method="POST">
                        <label for="Email" class="label">Email</label><br>
                        <input type="email" required name="email" class="input"><br>
                        <label for="pass" class="label">Password</label><br>
                        <input type="password" required name="password" class="input"><br>
                        <!-- <a href="account.php"> -->
                        <button name="login" class="btn ml">Войти</button>
                        <!-- </a><br> -->
                        <a href="#" class="button2 popup__h2">Зарегистрироваться</a>
                    </form>
                </div>
            </div>
			<div class="close-popup"></div>
		</div>
	</div>
    <!--  -->


    <!-- register -->
    <div class="overlay2">
		<div class="popup">
            <div class="bg2">
			<h2 class="popup__h2">Регистрация</h2>
                <div class="inp flex">
                <form action="php/register.php" method="POST">
                        <label for="name" class="label">Имя</label><br>
                        <input type="text" required name="name" class="input"><br>
                        <label for="lastname" class="label">Номер Телефона</label><br>
                        <input type="text" required  name="number" class="input"><br>
                        <label for="Email"  class="label">Email</label><br>
                        <input type="email"required name="email" class="input"><br>
                        <label for="pass" class="label">Password</label><br>
                        <input type="password" required name="password" class="input"><br>
                        <!-- <a href="account.php"> -->
                        <button class="btn ml" name="registration">Зарегистрироваться</button>
                        <!-- </a><br> -->
                       
                    </form>
                </div>
            </div>
			<div class="close-popup2"></div>
		</div>
	</div>
    <!--  -->
    <script src="js/auth.js"></script>
    <script src="js/register.js"></script>
    <script src="js/menu.js"></script>
</body>
</html>


