<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>В этом шаблоне вы увидите информацию о переданных параметрах</h2>

<?php
$params = $this->getData();
if ($params !== null) {
    foreach ($params as $key => $value) {
        echo '<br>';
        echo "$key => $value";
        echo '<br>';
    }
}
?>
</body>
</html>

