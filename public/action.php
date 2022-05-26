<?php
    $msg_box = ""; // в этой переменной будем хранить сообщения формы
    $errors = array(); // контейнер для ошибок
    // проверяем корректность полей
    if($_POST['user_name'] == "")    $errors[] = "Поле 'Ваше имя' не заполнено!";
    if($_POST['user_email'] == "")   $errors[] = "Поле 'Ваш e-mail' не заполнено!";
    if($_POST['text_comment'] == "") $errors[] = "Поле 'Текст сообщения' не заполнено!";
 
    // если форма без ошибок
    if(empty($errors)){
        // собираем данные из формы
        $message  = "Заказ №: " . $_POST['user_name'] . "<br/>";
        $message .= "Новая цена: " . $_POST['user_email'] . "<br/>";
        $message .= "ID пользователя: " . $_POST['text_comment'];      
        send_mail($message); // отправим письмо
        // выведем сообщение об успехе
        $msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";
    }else{
        // если были ошибки, то выводим их
        $msg_box = "";
        foreach($errors as $one_error){
            $msg_box .= "<span style='color: red;'>$one_error</span><br/>";
        }
    }
 
    // делаем ответ на клиентскую часть в формате JSON
    echo json_encode(array(
        'result' => $msg_box
    ));
     
     
    // функция отправки письма
    function send_mail($message){
        // почта, на которую придет письмо
        $mail_to = "alexandr-kim@mail.ru";
        //$mail_to = "cherepanov9434@mail.ru"; 
        // тема письма
        $subject = "Обновление цены";
         
        // заголовок письма
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
        $headers .= "From: Тестовое письмо <no-reply@test.com>\r\n"; // от кого письмо
         
        // отправляем письмо 
        mail($mail_to, $subject, $message, $headers);
    }
?>
<?php
include "dp.php";
$where=$_POST['user_name'];
$pri=$_POST['user_email'];
$id_user=$_POST['text_comment'];  

$sth = $dbh->prepare("UPDATE `zakaznagruzs` SET `tekprice` = :tekprice WHERE `id` = :id");
$sth->execute(array('tekprice' => $pri, 'id' => $where));

$statement = $dbh->prepare('INSERT INTO bids (id_zak, bid, id_user)
VALUES (:id_zak, :bid, :id_user)');
$statement->execute(['id_zak' => $where, 'bid' => $pri, 'id_user' => $id_user,]);

$con = new mysqli("localhost","alexavl1_wj", "R5p7*2H9", "alexavl1_wj");
$execItems = $con->query("UPDATE `zakaznagruzs` SET `kolo` = `kolo` + 1");



?>