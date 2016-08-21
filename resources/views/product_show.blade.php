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

<li><h4>Количество:</h4></li>
<form action="/addtocart" method="get">
<input type = "hidden" name = "id" value = "{{$product->id}}">
<input type = "hidden" name = "cat" value = "{{$pathCategory->id}}">
<select name="qtyadd">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
</select>
    <button class="btn-danger">Добавить в корзину</button>
</form>
{!!$product->descr !!}

<li><h4>Входит в категории:</h4></li>
{{info($product->categories)}}

@foreach($product->parentCategories as $cat)

    <h5>-><a href="{{URL::to('/category/'.$cat->id)}}">{{$cat->name}}</a></h5>
@endforeach
@endsection