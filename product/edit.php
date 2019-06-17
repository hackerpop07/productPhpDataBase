<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include_once 'class/App.php';
    $app = new App();
    $data = $app->viewObject($_GET['id']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $decreption = $_POST["decreption"];
    $has_error = true;
    if (empty($name) == 1) {
        $nameError = "Name không được bỏ trống!";
        $has_error = false;
    };
    if (empty($price) == 1) {
        $priceError = "Giá không được để trống!";
        $has_error = false;
    } else if ($price <= 0) {
        $priceError = "Giá là dãy số nguyên dương";
        $has_error = false;
    };
    if (empty($decreption) == 1) {
        $decreptionError = "Mô tả không được bỏ trống!";
        $has_error = false;
    };
    if ($has_error) {
        include_once 'class/App.php';
        $app = new App($name, $price, $decreption,$_GET['id']);
        $app->edit();
        print_r($app->id);
        header('Location: index.php');
    };
}

?>
<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" class="profile">
    <input id="name" name="name" placeholder="Tên sản phẩm" value="<?php echo $data[0]['name']; ?>">
    <span class="error">*<?php echo $nameError; ?></span>
    <br>
    <input id="price" name="price" type="number" placeholder="Giá bán" value="<?php echo $data[0]['price']; ?>">
    <span class="error">*<?php echo $priceError; ?></span>
    <br>
    <input id="decreption" name="decreption" placeholder="Mô tả" value="<?php echo $data[0]['decreption']; ?>">
    <span class="error">*<?php echo $decreptionError; ?></span>
    <br>
    <input id="submit" type="submit" value="EDIT">
    <br>
</form>
<style>
    #name, #price, #decreption {
        width: 200px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        padding: 12px 10px 12px 10px;
    }

    #submit {
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }

    .profile {
        height: auto;
        width: 1000px;
        overflow: hidden;
    }

    .error {
        color: #FF0000;
    }

</style>

</body>
</html>
