<?php

if (isset($_POST['otpr'])) {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Проверяем, что все поля заполнены
    if (empty($name) || empty($email) || empty($message)) {
        exit();
    }
   
    $conn = mysqli_connect("localhost", "root", "root", "tuning_center");
    // Проверяем подключение к базе данных
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
    // Добавляем пользователя в базу данных
    $sql = mysqli_query($conn, "INSERT INTO contact (name,  email, message) VALUES ('$name', '$email','$message')");

    mysqli_close($conn);
    echo "Спасибо за обращение";
}
?>

<section class="contact">
        <div class="contact-head">
            <h1>Контакты</h1>
        </div>
        <div class="contact-content">
            <div class="feedback">
                <div class="feedback-head">
                    <h2>Обратная связь</h2>
                </div>
                <div class="inp">
                    <form action="" method="POST">
                        <label for="name" class="label">Ваше имя</label><br>
                        <input type="text" required name="name" class="input"><br>
                        <label for="Email" class="label">Email</label><br>
                        <input type="email" required name="email" class="input"><br>
                        <label for="message" class="label">Текст сообщения</label><br>
                        <textarea name="message" required class="textarea"></textarea><br>
                        <button class="btn" name="otpr">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact-footer">
            <p>Адрес:Москва, Нежинская.ул д7</p>
            <p>Телефон: +7 928 077 78 63</p>
        </div>
</section>