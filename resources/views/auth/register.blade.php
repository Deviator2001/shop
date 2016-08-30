@extends('layouts.master')
@section('header.right')
    <h4>Регистрация на сайте</h4>
    {!! Form::open() !!}
    @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Email' ])
    @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
    @include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Подтверждение пароля', 'placeholder' => 'Пароль' ])
    @include('widgets.form._formitem_btn_submit', ['title' => 'Регистрация'])
    {!! Form::close() !!}
@stop