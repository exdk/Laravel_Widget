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
        //$message .= "Текст письма: " . $_POST['text_comment'];      
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
try {
	$dbh = new PDO('mysql:dbname=alexavl1_wg;host=localhost', 'alexavl1_wg', 'ym4c*s6U');
} catch (PDOException $e) {
	die($e->getMessage());
}
$where=$_POST['user_name'];
$pri=$_POST['user_email'];  

$sth = $dbh->prepare("UPDATE `zakaznagruzs` SET `zak` = :zak WHERE `id` = :id");
$sth->execute(array('zak' => $pri, 'id' => $where));
?>