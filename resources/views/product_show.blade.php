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

<h3>Производитель: {{$product->brand->name}}</h3>
<h3>Товар: {{$product->model}}</h3>

<h3>Цена: {{$product->price}}</h3>
<h3>Артикул: {{$product->id}}</h3>

<h3>Аннотация:</h3>
{!! $product->mini_descr !!}

<h3>Описание:</h3>
{!!$product->descr !!}

<h3>Входит в категории:</h3>

{{info($product->categories)}}

@foreach($product->parentCategories as $cat)

    <li>-><a href="{{URL::to('/category/'.$cat->id)}}">{{$cat->name}}</a></li>
@endforeach
@endsection