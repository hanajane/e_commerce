<?php

namespace App;

class Cart
{
    public $items;          // ['id' => ['quantity' => , 'price' => , 'data' =>]]
    public $totalQuantity;
    public $totalPrice;

    public function __construct($prevCart)
    {
        if($prevCart != null)
        {
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;
//            $this->grandTotal = $subtotal;
        }
        else
        {
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    //add times to cart
    public function addItem($id, $product)
    {
        $price = (int) str_replace("$", "", $product->price);

        // if the item is already exists
        if(array_key_exists($id, $this->items))
        {
            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
            $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
            //first time to add this product to cart
        }
        else
        {
            $productToAdd = ['quantity' => 1, 'totalSinglePrice' => $price, 'data' => $product];
        }

        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;
    }

    public function updatePriceAndQuantity()
        {
            $totalQuantity = 0;

            foreach ($this->items as $item)             //loop through the big Cart, gets existing count
            {
                $totalQuantity = $totalQuantity + $item['quantity'];    //updates the existing quantity of the cart
                $totalPrice = $totalPrice + $item['totalSinglePrice']; //updates the existing subtotal price
            }
            $this->totalQuantity = $totalQuantity;      //now the totalQuantity is updated
            $this->totalPrice = $totalPrice;            //now the totalQuantity is updated
        }
}
