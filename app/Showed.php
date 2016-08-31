<?php

namespace App;


class Showed
{
    public $showeditems = null;

    public function __construct($oldShowed)
    {
        if($oldShowed)//проверка на существование старых просмотров
        {
            $this->showeditems = $oldShowed->showeditems;
        }

    }

    public function add($showeditem, $id)

    {
        $showedItem = ['showeditem'=>$showeditem];//создаем экземпляр (строку) товара в просмотрах
        if($this->showeditems)//проверка на наличие товаров в корзине
        {
            if(array_key_exists($id, $this->showeditems))//проверка на наличие товара с данным id в просмотренных товарах
            {
                $showedItem = $this->showeditems[$id];//если товар уже есть ему присваиваются существующие значения из корзины
            }
        }
        $this->showeditems[$id] = $showedItem;//в содержимое корзины заносится данный экземпляр товара
        //$this->showeditems = count($this->showeditems);//общее число товаров равно кол-ву записей
    }
}
