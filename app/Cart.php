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

    public function add($item, $id, $qtyadd, $cat)
    {

        $storedItem = ['qty'=>0, 'price'=>$item->price, 'item'=>$item, 'cat'=>$cat];
        if($this->items)//проверка на наличие товаров в корзине
        {
            if(array_key_exists($id, $this->items))//проверка на наличие товара с данным id в товарах корзины $this->items
            {
                $storedItem = $this->items[$id];//если товар уже есть ему присваиваются существующие значения из корзины
            }
        }
        $storedItem['qty']+=$qtyadd;//добавляется количество товара
        $storedItem['price'] = $item->price * $storedItem['qty'];//общая цена товара данного id
        $this->items[$id] = $storedItem;//в содержимое корзины заносится данный экземпляр товара
        $this->totalQty = count($this->items);//общее число товаров равно кол-ву записей
        $this->totalPrice = array_sum(array_column($this->items, 'price'));//общая сумма товаров в корзине
    }
}
