<?php


class Product
{

    public $name;
    public $price;
    public $decreption;
    public $id;

    public function __construct($name, $price, $decreption, $id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->decreption = $decreption;
        $this->id = $id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return mixed
     */
    public function getDecreption()
    {
        return $this->decreption;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


    /**
     * @param mixed $decreption
     */
    public function setDecreption($decreption): void
    {
        $this->decreption = $decreption;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

}