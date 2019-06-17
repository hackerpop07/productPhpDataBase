<?php
include_once 'Product.php';

class App extends Product
{
    private $connectDataBase;
    private $username;
    private $password;

    public function __construct($name = '', $price = '', $decreption = '', $id = '')
    {
        parent::__construct($name, $price, $decreption, $id);
        $this->username = "root";
        $this->password = "123456@Abc";
        $this->connectDataBase = new PDO('mysql:host=localhost;dbname=product', $this->username, $this->password);

    }

    public function viewFrom()
    {
        $sql = "select*from product";
        $data = $this->connectDataBase->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function add()
    {

        $sql = "INSERT INTO `product`(`name`, `price`, `decreption`) VALUES (?,?,?)";
        $data = array($this->name, $this->price, $this->decreption);
        $this->connectDataBase->prepare($sql)->execute($data);
    }

    public function viewObject($id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM `product` WHERE `id` = " . $this->id;
        $data = $this->connectDataBase->prepare($sql);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit()
    {
        try {

            $this->connectDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Câu SQL
            $sql = "UPDATE `product` SET `name`='" . $this->name . "',`price`=" . $this->price . ",`decreption`='" . $this->decreption . "' WHERE id=" . $this->id;
            // Prepared câu SQL
            $stmt = $this->connectDataBase->prepare($sql);
            // Thực thi câu SQL
            $stmt->execute();
            // Xuất kết quả tổng số record đã update
            echo $stmt->rowCount() . " records thành công";
        } catch (PDOException $e) {
            echo 'Lỗi' . "<br>" . $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $this->connectDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Câu SQL
            $sql = "DELETE FROM `product` WHERE id=" . $this->id;
            // Prepared câu SQL
            $stmt = $this->connectDataBase->prepare($sql);
            // Thực thi câu SQL
            $stmt->execute();
            // Xuất kết quả tổng số record đã delete
            echo $stmt->rowCount() . " delete thành công";
        } catch (PDOException $e) {
            echo 'Lỗi' . "<br>" . $e->getMessage();
        }
    }

}
