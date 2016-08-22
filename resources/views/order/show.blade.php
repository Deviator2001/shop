@extends('layouts.master')

@section('body')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">На главную</a></li>
                    <li class="active">Оформление заказа</li>
                </ol>
            </div>
            <div>
                <h2>Оформление заказа</h2>
                <table>
                    {!! Form::open(array('url' => 'order/add')) !!}
                    <tr><td><h4> Ваша почта: </h4></td><td>{!! Form::text('email',  null, array('placeholder' => 'Email*')) !!}</td></tr>
                    <tr><td><h4>Номер телефона:</h4></td><td>{!! Form::text('phone',  null, array('placeholder' => 'Телефон')) !!}</td></tr>
                    <tr><td><h4>Имя:</h4></td><td>{!! Form::text('first_name', null, array('placeholder' => 'Имя')) !!}</td></tr>
                    <tr><td><h4>Фамилия:</h4></td><td>{!! Form::text('last_name', null, array('placeholder' => 'Фамилия')) !!}</td></tr>
                    <tr><td><h4>Способ доставки:&nbsp</h4></td><td>{!! Form::select('delivery_id', $deliveries)!!}</td></tr>
                    <tr><td><h4>Способ оплаты:&nbsp</h4></td><td>{!! Form::select('payment_id', $payments)!!}</td></tr>
                    <tr><td><h4>Адрес доставки:</h4></td><td>{!! Form::text('address', null, array('placeholder' => 'Адрес')) !!}</td></tr>
                    <tr><td><h4>Комментарий к заказу:&nbsp</h4></td><td><textarea name="description"  placeholder="Укажите здесь необходимую дополнительную информацию к заказу" rows="4"></textarea></td></tr>
                    <tr><td>{!! HTML::link('/', 'Продолжить Покупки', array('class' => 'btn btn-default check_out')) !!}</td>
                        <td>{!! Form::submit('Отправить заказ', array('class' => 'btn btn-success')) !!}</td></tr>
                    {!! Form::close() !!}
                </table>
            </div>
        </div>
    </section>
@stop