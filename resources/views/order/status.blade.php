@extends('layouts.master')
@section('body')
    @if (count($orders)>0)
        <h1>Мои заказы:</h1>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№Заказа</th>
                        <th></th>
                        <th>Дата размещения</th>
                        <th style="align-content: center">Сумма</th>
                        <th class="text-center">Состояние</th>
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

                            </td>
                            <td>
                                {{$order->created_at}}
                            </td>
                            <td>
                            {{$order->cart->totalPrice}}
                            </td>
                            <td>
                                {{$order->status}}
                            </td>
                        </tr>
                    @endforeach
                 </table>
            </div>
        </div>
    @else
        <h1>Вами еще не сделано ни одного заказа</h1>
    @endif

@endsection