<?php

namespace App;

class Cart
{
    public $items = null;
    public $qty = 0;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart)//проверка на существование старой корзины, если сущ, новой присваиваем ее значения
        {
            $this->items = $oldCart->items;
            $this->qty = $oldCart->qty;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function add($item, $id, $qtyadd)
    {

        $storedItem = ['qty'=>0, 'price'=>$item->price, 'item'=>$item];
        if($this->items)//проверка на наличие товаров в корзине
        {
            if(array_key_exists($id, $this->items))//проверка на наличие данного товара в корзине
            {
                $storedItem = $this->items[$id];//если товар есть ему присваиваются существующие значения
            }
        }
        $storedItem['qty']+=$qtyadd;//добавляется количество товара
        $storedItem['price'] = $item->price * $storedItem['qty'];//общая цена товара
        $this->items[$id] = $storedItem;//в содержимое корзины заносится данный экземпляр товара
        $this->totalQty = count($this->items);
        $this->totalPrice += $item->price* $storedItem['qty'];;
    }
}
