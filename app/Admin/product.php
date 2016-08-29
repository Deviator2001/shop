<?php
use App\product;
use App\brand;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(product::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
            AdminColumn::text('brand.name')->setLabel('Производитель'),
            AdminColumn::link('model')->setLabel('Модель'),
            AdminColumn::link('price')->setLabel('Цена'),
            AdminColumn::link('availability.title')->setLabel('Наличие'),
            AdminColumn::link('category.name')->setLabel('Категория'),
            AdminColumn::link('mini_descr')->setLabel('Нотация'),
            AdminColumn::link('descr')->setLabel('Описание'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::select('brand_id', 'Производитель')->setModelForOptions('App\brand')->setDisplay('name'),
            AdminFormElement::text('model', 'Модель')->required(),
            AdminFormElement::select('availability_id', 'Наличие')->setModelForOptions('App\Availability')->setDisplay('title'),
            AdminFormElement::select('category_id', 'Категория')->setModelForOptions('App\Category')->setDisplay('name'),
            AdminFormElement::textaddon('price', 'Цена')->setAddon('$')->placeAfter(),
            AdminFormElement::textarea('mini_descr', 'Нотация'),
            AdminFormElement::wysiwyg('descr', 'Описание'),
            AdminFormElement::images('images', 'Фото'),
            //categories - функция из модели App\product
        ]);
    });
});