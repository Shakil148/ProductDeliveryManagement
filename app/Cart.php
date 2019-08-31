<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Cart
{
  public $items;
  public $totalQty = 0;
  public$totalPrice = 0;

  public function _construct($oldCart){
      if($oldCart){
          $this->items = $oldCart->items;
          $this->totalQty = $oldCart->totalQty;
          $this->totalPrice = $oldCart->totalPrice;
      }
  }

  public function add($item, $id){
    $storedIteam = ['qty' => 0, 'price' => $item->price, 'item' => $item];
    if($this->items){
        if(array_key_exists($id, $this->items)){
            $storedItem = $this->items[$id];
        }
    }
    $this->items[$id] = $storedItem;
    $storedItem['qty']++;
    $storedItem['price'] = $item->price * $storedItem['qty'];
    $this->item[$id] = $storedItem;
    $this->totalPrice += $item->price;


  }
}
