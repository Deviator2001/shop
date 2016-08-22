<?php
use App\Payment;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Payment::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {

        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
        $display->setOrder([[1, 'asc']]);

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Способ оплаты')->setWidth('100px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Способ оплаты')->required(),
        ]);
    });
});