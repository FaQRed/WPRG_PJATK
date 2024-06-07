<?php
class Invoice {
    private $product_number;
    private $product_description;
    private $quantity;
    private $pricePerItem;

    /**
     * @param $product_number
     * @param $product_description
     * @param $quantity
     * @param $pricePerItem
     */
    public function __construct($product_number, $product_description, $quantity, $pricePerItem)
    {
        $this->product_number = $product_number;
        $this->product_description = $product_description;
        $this->quantity = $quantity;
        $this->pricePerItem = $pricePerItem;
    }

    /**
     * @return mixed
     */
    public function getProductNumber()
    {
        return $this->product_number;
    }

    /**
     * @param mixed $product_number
     */
    public function setProductNumber($product_number)
    {
        $this->product_number = $product_number;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->product_description;
    }

    /**
     * @param mixed $product_description
     */
    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPricePerItem()
    {
        return $this->pricePerItem;
    }

    /**
     * @param mixed $pricePerItem
     */
    public function setPricePerItem($pricePerItem)
    {
        $this->pricePerItem = $pricePerItem;
    }



    public function Amount() {
        if ($this->quantity <= 0 || $this->pricePerItem <= 0) {
            return 0;
        }
        return $this->quantity * $this->pricePerItem;
    }
}
