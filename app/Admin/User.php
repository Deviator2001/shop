<?php

use App\User;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {

        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
        $display->setOrder([[1, 'asc']]);

        $display->setColumns([
            AdminColumn::link('first_name')->setLabel('Имя пользователя')->setWidth('100px'),
            AdminColumn::link('email')->setLabel('Почта')->setWidth('100px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('email', 'Почта')->required(),
            AdminFormElement::timestamp('last_login', 'Last Login'),//->seconds(true),
            AdminFormElement::text('first_name', 'First Name'),
            AdminFormElement::text('last_name', 'Last Name'),
            AdminFormElement::multiselect('theroles', 'Роли')->setModelForOptions('App\Role')->setDisplay('name'),
        ]);
    });
});