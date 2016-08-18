<?php
use App\brand;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(brand::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {

        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
        $display->setOrder([[1, 'asc']]);

        $display->setColumns([
            AdminColumn::link('name')->setLabel('Производитель')->setWidth('100px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('name', 'Производитель')->required(),
        ]);
    });
});