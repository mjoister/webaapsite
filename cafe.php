<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DurgerKingBot</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, viewport-fit=cover"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="MobileOptimized" content="176"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="robots" content="noindex, nofollow"/>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <script>
      function setThemeClass() {
        document.documentElement.className = Telegram.WebApp.colorScheme;
      }
      Telegram.WebApp.onEvent('themeChanged', setThemeClass);
      setThemeClass();
    </script>
    <link href="css/cafe.css" rel="stylesheet">
</head>
<body style="display:none">

<section class="cafe-page cafe-items">

    <?php
        function csvToArray($csvFile){
            $file_to_read = fopen($csvFile, 'r');
            while (!feof($file_to_read) ) {
                $lines[] = fgetcsv($file_to_read, 1000, ';');
            }
            fclose($file_to_read);
            return $lines;
        }
        //read the csv file into an array
        $csvFile = 'items.txt';
        $csv = csvToArray($csvFile);


        foreach ($csv as $item) {
echo <<<EOL
<div class="cafe-item js-item" data-item-id="$item[0]" data-item-price="$item[2]">
    <div class="cafe-item-counter js-item-counter">1</div>
    <div class="cafe-item-photo">
        <picture class="cafe-item-lottie js-item-lottie">
            <img src="img/cafe/$item[3]"
                 style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJnIiB4MT0iLTMwMCUiIHgyPSItMjAwJSIgeTE9IjAiIHkyPSIwIj48c3RvcCBvZmZzZXQ9Ii0xMCUiIHN0b3Atb3BhY2l0eT0iLjEiLz48c3RvcCBvZmZzZXQ9IjMwJSIgc3RvcC1vcGFjaXR5PSIuMDciLz48c3RvcCBvZmZzZXQ9IjcwJSIgc3RvcC1vcGFjaXR5PSIuMDciLz48c3RvcCBvZmZzZXQ9IjExMCUiIHN0b3Atb3BhY2l0eT0iLjEiLz48YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJ4MSIgZnJvbT0iLTMwMCUiIHRvPSIxMjAwJSIgZHVyPSIzcyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiLz48YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJ4MiIgZnJvbT0iLTIwMCUiIHRvPSIxMzAwJSIgZHVyPSIzcyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cGF0aCBmaWxsPSJ1cmwoI2cpIiBkPSJNMjY4LDQ5OWMtNTEtMi0xMDYtMS0xNTMtMjItMjgtMTItMzktNDAtNDItNjgsMC00LDMtNywxLTEwLTUtNi0xNiwzLTEzLTE0LDItMTEsMTItMTQsMTEtMjcsMC0yLTUtMTItNS0xNiwwLTYsNS0xNyw0LTIyLTItNy05LTUtNi0xNSwzLTEwLDE0LTcsMTktMTMsNy0xMi0xNC0yNC0xNy0zMy0zLTEyLTEtMjgsMi0zOSwyOC0xMDEsMTQ4LTEzMywyMzktMTE1LDY0LDEzLDEzMCw1OSwxNDIsMTI3LDMsMTgsMCwzMi0xNSw0Mi0xLDEtMTEsMTMtNywxNiw0LDIsMjAsNCwyMiw5LDYsMTAtNywxNS05LDIyLTEsMywzLDExLDMsMTYsMCwyLTMsMTctMiwxOSwyLDIsOCwxLDEwLDQsMyw1LDQsMTYsNiwyMiw0LDEzLTE1LDIwLTE5LDI3LTksMjAsNSw0MC0yMyw2MC00MCwyOC0xMDEsMjktMTQ4LDMweiIvPjwvc3ZnPg==');">
        </picture>
    </div>
    <div class="cafe-item-label">
        <span class="cafe-item-title">$item[1]</span>
    </div>
    <div class="cafe-item-buttons">
        <button class="cafe-item-decr-button js-item-decr-btn button-item ripple-handler">
            <span class="ripple-mask"><span class="ripple"></span></span>
        </button>
        <button class="cafe-item-incr-button js-item-incr-btn button-item ripple-handler">
            <span class="button-item-label">$item[2] Р.</span>
            <span class="ripple-mask"><span class="ripple"></span></span>
        </button>
    </div>
</div>
EOL;
}
    ?>

    </div>
    <div class="cafe-item-shadow"></div>
    <div class="cafe-item-shadow"></div>
    <div class="cafe-item-shadow"></div>
    <div class="cafe-item-shadow"></div>
</section>

<section class="cafe-page cafe-order-overview">
    <div class="cafe-block">
        <div class="cafe-order-header-wrap">
            <h2 class="cafe-order-header">Ваш заказ</h2>
            <span class="cafe-order-edit js-order-edit">Изменить</span>
        </div>
        <div class="cafe-order-items">

        <?php

        foreach ($csv as $item) {

echo <<<EOL
<div class="cafe-order-item js-order-item" data-item-id="$item[0]">
    <div class="cafe-order-item-photo">
        <picture class="cafe-item-lottie js-item-lottie">
            <img src="img/cafe/$item[3]"

        </picture>
    </div>
    <div class="cafe-order-item-label">
        <div class="cafe-order-item-title">$item[1] <span class="cafe-order-item-counter"><span
                class="js-order-item-counter">1</span>x</span></div>
        <div class="cafe-order-item-description"></div>
    </div>
    <div class="cafe-order-item-price js-order-item-price">$item[2]</div>
</div>
EOL;
}
        ?>

        </div>
    </div>

    <div class="cafe-text-field-wrap">
        <textarea class="cafe-text-field js-order-name-field cafe-block" rows="1"
                  placeholder="Ваше имя"></textarea>
        <textarea class="cafe-text-field js-order-addr-field cafe-block" rows="1"
                  placeholder="Адрес"></textarea>
        <textarea class="cafe-text-field js-order-phone-field cafe-block" rows="1"
                  placeholder="Телефон"></textarea>
        <textarea class="cafe-text-field js-order-comment-field cafe-block" rows="1"
                  placeholder="Комментарии"></textarea>
        <div class="cafe-text-field-hint">
<!--            Any special requests, details, final wishes etc.-->
        </div>
    </div>
</section>
<div class="cafe-status-wrap">
    <div class="cafe-status js-status"></div>
</div>
<script src="https://tg.dev/js/jquery.min.js"></script>
<script src="cafe.js"></script>
<script>Cafe.init({"apiUrl":"\/cafe\/api","userId":0,"userHash":null});</script>
</body>
</html>
<!-- page generated in 1.46ms -->
