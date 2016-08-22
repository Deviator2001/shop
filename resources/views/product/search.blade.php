@extends('layouts.master')
@section('body')
    <div class="container-fluid">
    @if ($products->count())
            <h3>По вашему запросу найдены следующие товары:</h3>
            <ul>
                @foreach($products as $product)
                    <li>
                        <a href="{{URL::to('product/'.$product->id)}}">{{$product->model}}</a>
                    </li>
                @endforeach
            </ul>
    @else
            <h3>По вашему запросу ничего не найдено.</h3>
    @endif
    </div>
@endsection