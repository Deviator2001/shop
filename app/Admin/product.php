<?php
use App\product;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(product::class, function (ModelConfiguration $model) {
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()->setColumns([
            AdminColumn::link('title')->setLabel('Title'),
        ])->paginate(5);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Title')->required(),
            //AdminFormElement::wysiwyg('text', 'Text', 'simplemde')->required()->setFilteredValueToField('text_html'),
        ]);
    });
});