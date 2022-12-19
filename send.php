<?php
    $data = $_POST['order_data'];
    $name = $_POST['name'];
    $addr = $_POST['addr'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];
    $total_price = $_POST['total_price'];
    $email = $_POST['email'];
    $email = htmlspecialchars($email);
    $email = urldecode($email);

    $date = date('d.m.Y H:i:s', time());
    $items = json_decode($data, true);
    $items_text = "";
    foreach($items as $item) {
       $items_text.= "- " . $item["title"] . ", кол-во: " . $item["count"] . " цена за шт. " . $item["price"] . ", итого " . $item["price"]*$item["count"] . "\r\n";
    }
    $text = "Имя:".$name."\r\nТелефон: ".$phone."\r\nАдрес: ".$addr."\r\nКомментарии: ".$comment . "\r\n" . $items_text . "Итого сумма: " . $total_price . "\r\n" . $date;

    $file = 'data.txt';
    file_put_contents($file,$text);

    if ($data) {
        if (mail("walktt@mail.ru", "Заказ с сайта", $text))
         {echo json_encode(array('ok'=>'true'));
        } else {
            echo "При отправке возникли ошибки";
        }
    }
?>