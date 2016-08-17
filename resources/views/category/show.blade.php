@extends('layouts.master')
@section('body')
<div class="container-fluid">
@if($many)
    <h3><p>Каталог товаров интернет магазина</h3>
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
    <h3>{{$node->name}}</h3>
    @if($node->getDescendantCount()>0)
        <ul class="sub-menu-ul">
            @foreach($node->descendants->toTree($node) as $descend)
                <li><a href="{{URL::to('/category/'.$descend->id)}}">{{$descend->name}}</a></li>
            @endforeach
        </ul>
    @endif
    @foreach($node->attaches as $attach)
        <a rel="gallery" class="photo" href="/images/{{($attach->filename)}}"><img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}" width="171">
    @endforeach
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