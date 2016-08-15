<?php
use App\Permit;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Permit::class, function (ModelConfiguration $model) {
	// Display
	$model->onDisplay(function () {

		$display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
		$display->setOrder([[1, 'asc']]);

		$display->setColumns([
			AdminColumn::link('name')->setLabel('Название')->setWidth('100px'),
			AdminColumn::link('slug')->setLabel('Ярлык')->setWidth('100px'),
		]);
		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {
		return AdminForm::form()->setItems([
			AdminFormElement::text('name', 'Название')->required(),
			AdminFormElement::text('slug', 'Ярлык')->required(),
		]);
	});
});






/*
Admin::model('App\Permit')->title('Права пользователей')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Наименование'),
		Column::string('slug')->label('Ярлык'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name'),
		FormItem::text('slug', 'Slug'),
	]);
	return $form;
});
*/