<?php

use App\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Category::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {
        //$model->setTitle('Pages');
        $display = AdminDisplay::tree()->setValue('name');
        $display = AdminDisplay::tree()->setValue('slug');

        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('name', 'Название')->required(),
            AdminFormElement::text('slug', 'Указатель')->required(),
        ]);
    });
});