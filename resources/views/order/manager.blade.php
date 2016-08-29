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
                                <a href="/orderitem/{{$order->id}}"> <button type="button" class="btn btn-default">
                                        <span class="fa fa-shopping-cart"></span> {{$order->id}}
                                    </button>
                                </a>
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
                            <td>
                                <form action={{ route('order.destroy', [$order->id])}} method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button class="btn btn-danger">Удалить</button>
                                </form>
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