<?php
class Validate
{
    private $product_type;
    private $company;
    private $price;
    private $quantity;


    public function __construct($product_type, $company, $quantity, $price)
    {
        $this->product_type = $product_type;
        $this->company = $company;
        $this->price = $price;
        $this->quantity = $quantity;
    }


    private function is_null(): bool
    {
        return !($this->product_type!=null && $this->company!=null && $this->quantity!=null && $this->price!=null);
    }

    private function is_quantity_and_price_valid_numbers(): bool
    {
        return (is_numeric($this->quantity) && is_numeric($this->price) && $this->quantity>0 && $this->price >0);
    }

    public function validate_data():string
    {
        if ($this->is_null()) return "One of the fields is empty !";
        else if (!$this->is_quantity_and_price_valid_numbers()) return "Not valid numbers !";
        else return "validated";
    }
}
