@extends('layouts.master')
@section('body')
    @if (count($orders)>0)
        <h1>Размещенные заказы:</h1>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№Заказа</th>
                        <th>Дата размещения</th>
                        <th style="align-content: center">Сумма</th>
                        <th style="align-content: center">Фамилия</th>
                        <th style="align-content: center">Имя</th>
                        <th style="align-content: center">Телефон</th>
                        <th style="align-content: center">Почта</th>
                        <th class="text-center">Состояние Заказа</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                {{$order->id}}
                            </td>
                            <td>
                                {{$order->created_at}}
                            </td>
                            <td>
                                {{$order->cart->totalPrice}}
                            </td>
                            <td>
                                {{$order->last_name}}
                            </td>
                            <td>
                                {{$order->first_name}}
                            </td>
                            <td>
                                {{$order->phone}}
                            </td>
                            <td>
                                {{$order->email}}
                            </td>
                            <td>
                                {{$order->status}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <p>{!!$orders->render()!!}</p>
    @else
        <h1>Вами еще не сделано ни одного заказа</h1>
    @endif

@endsection