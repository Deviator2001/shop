<?php

use App\Order;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Order::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {

        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
        $display->setOrder([[1, 'asc']]);

        $display->setColumns([
            AdminColumn::link('first_name')->setLabel('Имя'),
            AdminColumn::link('last_name')->setLabel('Фамилия'),
            AdminColumn::link('phone')->setLabel('Телефон'),
            AdminColumn::link('email')->setLabel('Почта'),
            AdminColumn::link('address')->setLabel('Адрес доставки'),
            AdminColumn::link('cart')->setLabel('Корзина')->setWidth('100px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('name', 'Название роли')->required(),
            AdminFormElement::text('slug', 'Роль')->required(),
            AdminFormElement::multiselect('permits', 'Права доступа')->setModelForOptions('App\Permit')->setDisplay('name'),
            //в multiselect "permits" - это функция отношения permits() из модели App\Role
        ]);
    });
});