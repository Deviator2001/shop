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
                    <tr>
                        <td>
                            <h5> Ваша почта: </h5>
                        </td>
                        <td>
                            {!! Form::text('email',  null, array('placeholder' => 'Email*', 'size' =>40)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Номер телефона:</h5>
                        </td>
                        <td>
                            {!! Form::text('phone',  null, array('placeholder' => 'Телефон', 'size' =>40)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Имя:</h5>
                        </td>
                        <td>
                            {!! Form::text('first_name', null, array('placeholder' => 'Имя', 'size' =>40)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Фамилия:</h5>
                        </td>
                        <td>
                            {!! Form::text('last_name', null, array('placeholder' => 'Фамилия', 'size' =>40)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Способ доставки:&nbsp</h5>
                        </td>
                        <td>
                            {!! Form::select('delivery_id', $deliveries)!!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Способ оплаты:&nbsp</h5>
                        </td>
                        <td>
                            {!! Form::select('payment_id', $payments)!!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Адрес доставки:</h5>
                        </td>
                        <td>
                            {!! Form::text('address', null, array('placeholder' => 'Адрес', 'size' =>40)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Комментарий к заказу:&nbsp</h5>
                        </td>
                        <td>
                            <textarea cols="37" name="descr"  placeholder="Укажите здесь необходимую дополнительную информацию к заказу" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! HTML::link('/category', 'Продолжить Покупки', array('class' => 'btn btn-default')) !!}
                        </td>
                        <td>
                            &nbsp;{!! Form::submit('Отправить заказ', array('class' => 'btn btn-success')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    {!! Form::close() !!}
                </table>
            </div>
        </div>
    </section>
@stop