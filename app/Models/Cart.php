<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = [];
    public $totalQuantity;
    public $totalPrice;

    public function __construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalQuantity = $cart->totalQuantity;
            $this->totalPrice = $cart->totalPrice;
        } else {

            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product)
    {
        $item = [
            'id' =>  $product->id,
            'product_name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 0,
            'product_image' => $product->product_image,
        ];

        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->totalQuantity += 1;
            $this->totalPrice += $product->price;

        } else {

            $this->totalQuantity += 1;
            $this->totalPrice += $product->price;
        }

        $this->items[$product->id]['quantity'] += 1;

    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            $this->totalQuantity -= $this->items[$id]['quantity'];
            $this->totalPrice -= $this->items[$id]['quantity'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function updateCart($id, $quantity)
    {
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price']*$this->items[$id]['quantity'];
        $this->items['$id']['quantity'] = $quantity;
        $this->totalQuantity += $quantity ;
        $this->totalPrice += $this->items[$id]['price'] * $quantity   ;
    }

}
