@extends('layouts.master')
@section('body')
<div id="resultpost"></div>
<div id="resulterrorpost"></div>
<div class="popuporderform">
    {!! Form::open(array('id' => 'popupfrmcallorder')) !!}
    {!! Form::text('username')!!}
    <input type="button" value="Заказать консультацию" onclick="AjaxFormRequest('resultpost', 'resulterrorpost', 'popupfrmcallorder', '/popupcallorderajax' )" class="btn btn-addtocart-b btn-popup" />
    {!! Form::close() !!}
</div>
@endsection