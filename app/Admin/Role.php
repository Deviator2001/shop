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
			//в multiselect "permits" - это функция отношения permits() из модели App\Role
		]);
	});
});