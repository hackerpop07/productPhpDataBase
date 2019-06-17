<?php
include_once 'class/App.php';
$app = new App();
$data = $app->viewFrom();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: add.php');
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
<form method="post">
    <a href="add.php"><input id="add" type="submit" value="ADD"></a>
    <h2 id="tieude">Danh sách</h2>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Giá Bán</td>
            <td>Ghi chú</td>
        </tr><?php foreach ($data as $index => $value): ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value["name"] ?></td>
                <td><?php echo $value["price"] ?></td>
                <td><?php echo $value["decreption"] ?></td>
                <td>
                    <a type="btn" href="edit.php?page=edit&id=<?php echo $value['id']; ?>">Edit</a>
                </td>
                <td>
                    <a type="btn" href="delete.php?page=delete&id=<?php echo $value['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    #tieude {
        text-align: center;
    }


    .profile img {
        width: 100%;
    }

    #add {
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }
</style>
