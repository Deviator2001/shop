<?php

use App\Role;
use App\Permit;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Role::class, function (ModelConfiguration $model) {
	// Display
	$model->onDisplay(function () {

		$display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
		$display->setOrder([[1, 'asc']]);

		$display->setColumns([
			AdminColumn::link('name')->setLabel('Название роли')->setWidth('100px'),
			AdminColumn::link('slug')->setLabel('Роль')->setWidth('100px'),
			]);
		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {
		return AdminForm::form()->setItems([
			AdminFormElement::text('name', 'Название роли')->required(),
			AdminFormElement::text('slug', 'Роль')->required(),
			AdminFormElement::multiselect('permits', 'Права доступа')->setModelForOptions('App\Permit')->setDisplay('name'),
			//AdminFormElement::text('permissions', 'Разрешения')->required(),
			//AdminFormElement::wysiwyg('text', 'Text', 'simplemde')->required()->setFilteredValueToField('text_html'),
		]);
	});
});












/*
Admin::model('App\Role')->title('Роли пользователей')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название роли'),
		Column::string('slug')->label('Роль'),
	]);
	return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
	if ( in_array($id, [1,2,3])) {
		$form->items([
			FormItem::text('name', 'Название роли'),
			FormItem::text('slug', 'Роль')->readonly(),
			FormItem::multiselect('permits', 'Права доступа')->model('App\Permit')->display('name'),
		]);
	}
	else {
		$form->items([
			FormItem::text('name', 'Название роли'),
			FormItem::text('slug', 'Роль'),
			FormItem::multiselect('permits', 'Права доступа')->model('App\Permit')->display('name'),
		]);
	}
	return $form;
})->delete(function ($id) { if ( in_array($id, [1,2,3])) return null; else return 1; });
*/