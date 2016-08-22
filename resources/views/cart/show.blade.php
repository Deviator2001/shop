@extends('layouts.master')
@section('body')
    @if (Session::has('cart'))
    <h1>В вашу корзину добавлены следующие товары:</h1>
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
                @foreach($products as $product)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="" style="width: 100px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="/product/{{$product['item']['id']}}">{{$product['item']['model']}}</a></h5>
                                </div>
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
                            <a href="/removeitem/{{$product['item']['id']}}"> <button type="button" class="btn btn-danger">
                                    <span class="fa fa-remove"></span> Удалить
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Итого</h3></td>
                    <td class="text-right"><h3><strong>${{$totalPrice}}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="/category"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> Продолжить Покупки
                            </button>
                        </a>
                    </td>
                    <td class="col-md-2">
                        <a href="/"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> Оформить Заказ
                            </button>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @else
        <h1>В корзине нет ни одного товара</h1>
    @endif

@endsection