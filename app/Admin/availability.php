<?php
use App\Availability;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Availability::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {

        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
        $display->setOrder([[1, 'asc']]);

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Наличие')->setWidth('100px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Наличие')->required(),
        ]);
    });
});