@extends('layouts.master')
@section('body')
<h3><a href="{{ url('/category') }}">Каталог товаров интернет магазина</a></h3>
<div class="container-fluid">
@if($many)
    <ul class="menu-ul">
        @foreach($nodes as $node)
                <li><h4><span>{{$node->name}}</span></h4></li>
                @if($node->getDescendantCount()>0)
                    <ul class="sub-menu-ul">
                        @foreach($node->descendants->toTree($node) as $descend)
                            <li><a href="{{URL::to('/category/'.$descend->id)}}">{{$descend->name}}</a></li> <!--ссылки на подкатегории -->
                        @endforeach
                    </ul>
                @endif
        @endforeach
    </ul>
@else
    <h2>{{$node->name}}</h2>
    @if($node->getDescendantCount()>0)
        <ul class="sub-menu-ul">
            @foreach($node->descendants->toTree($node) as $descend)
                <li><a href="{{URL::to('/category/'.$descend->id)}}">{{$descend->name}}</a></li>
            @endforeach
        </ul>
    @endif

    <h3>Товары категории</h3>
    <ul>
            @foreach($products as $product)
                <li>
                    @if($product->attaches()->count() > 0)
                        {{$product->attaches->title}}
                        <img src="{{URL::to($product->attaches->first()->filename)}}" alt="{{$product->attaches->first()->alt}} title="{{$product->attaches->first()->title}}>
                    @endif
                    <a href="{{URL::to('product/'.$product->id)}}">{{$product->model}}</a>
                </li>
            @endforeach
    </ul>
    {!! $products->links() !!}

    <h3></h3>
    <style>.ibl {display:inline-block;}</style>
    <li class="ibl"><a href="{{URL::to('/category/')}}">Главная</a></li>
    @foreach($node->getAncestors() as $descend)
        <li class="ibl">-><a href="{{URL::to('/category/'.$descend->id)}}">{{$descend->name}}</a></li>
    @endforeach
    <li class="ibl">->{{$node->name}}</li>
@endif
</div>
@endsection