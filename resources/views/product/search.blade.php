@extends('layouts.master')
@section('body')
    <div class="container-fluid">
    @if ($products->count())
            <h3>По вашему запросу найдены следующие товары:</h3>
            <table>
                <tr>
                    <th>Наименование</th>
                    <th></th>
                    <th>Цена</th>
                    <th></th>
                    <th>Доступность</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <a href="{{URL::to('product/'.$product->id)}}">{{$product->model}}</a>
                        </td>
                        <td>
                            &nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            {{$product->price}}
                        </td>
                        <td>
                            &nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            {{$product->availability->title}}
                        </td>
                    </tr>
                @endforeach
            </table>
    @else
            <h3>По вашему запросу ничего не найдено.</h3>
    @endif
    </div>
@endsection