@extends('layouts.master')
@section('body')
@if($pathCategory)
    <style>.ibl {display:inline-block;}</style>
    <li class="ibl"><a href="{{URL::to('/')}}">Главная</a></li>
    @foreach($pathCategory->getAncestors() as $descend)
        <li class="ibl">-><a href="{{URL::to('/category/'.$descend->id)}}">{{$descend->name}}</a></li>
    @endforeach
    <li class="ibl">-><a href="{{URL::to('/category/'.$pathCategory->id)}}">{{$pathCategory->name}}</a></li>
    <li class="ibl">->{{$product->model}}</li>
@endif

<h1>Вывод изображений товара</h1>
@if($product->attaches)
    @foreach($product->attaches as $attach)
        <img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
    @endforeach
@endif

<li><h4>Производитель:</h4> {{$brand}}</li>
<li><h4>Товар:</h4> {{$product->model}}</li>

<li><h4>Цена:</h4> {{$product->price}}</li>
<li><h4>Артикул:</h4> {{$product->id}}</li>

<li><h4>Аннотация:</h4></li>
{!! $product->mini_descr !!}

<li><h4>Описание:</h4></li>
{!!$product->descr !!}

<li><a href="/product/add/{{$product->id}}" class="btn btn-success pull-left" role="button">Добавить в корзину</a></li><br>
<li><h4>Входит в категории:</h4></li>
{{info($product->categories)}}

@foreach($product->parentCategories as $cat)

    <h5>-><a href="{{URL::to('/category/'.$cat->id)}}">{{$cat->name}}</a></h5>
@endforeach
@endsection