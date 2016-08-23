@extends('layouts.master')
@section('body')
    @if (count($orders)>0)
        <h1>Мои заказы:</h1>
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
                    @foreach($orders as $order)
                        <tr>
                        {{$order->id}}
                        </tr>
                    @endforeach
                 </table>
            </div>
        </div>
    @else
        <h1>Вами еще не сделано ни одного заказа</h1>
    @endif

@endsection