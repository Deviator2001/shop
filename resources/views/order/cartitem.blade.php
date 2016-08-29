@extends('layouts.master')
@section('body')
        <h1>Заказ №{{$order->id}}:</h1>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Товар</th>
                        <th></th>
                        <th>Количество</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Сумма</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->items as $product)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                    <div class="media-body">
                                        <h5 class="media-heading"><a href="/product/{{$product['item']['id']}}">{{$product['item']['model']}}</a></h5>
                                    </div>
                            </td>
                            <td>

                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                {{$product['qty']}}
                            </td>
                            <td class="col-sm-1 col-md-1 text-center">
                                {{$product['item']['price']}}
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>${{$product['price']}}</strong></td>
                            <td class="col-sm-1 col-md-1">
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Итого</h3></td>
                        <td class="text-right"><h3><strong>${{$cart->totalPrice}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        </td>
                        <td class="col-md-2">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection