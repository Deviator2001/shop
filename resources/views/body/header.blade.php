<ul class="nav navbar-nav">
    <li><a href="/category">Каталог товаров</a></li>
    <li><a href="/post/index">Новости</a></li>
    <li><a href="/">Контакты</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/cart') }}"><span class="glyphicon glyphicon-shopping-cart"></span>Корзина <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty:''}}</span></a></li>
        @if (Sentinel::guest())
            <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
            <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-registration-mark"></span> Регистрация</a></li>
        @else
        <li><a href="{{ url('/myorders') }}"><span class="glyphicon glyphicon-share-alt"></span>Мои заказы</a></li>
            <li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-wrench"></span> Управление сайтом</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>{{ Sentinel::check()->email }}</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}">Выйти</a></li>
                </ul>
            </li>
        @endif
</ul>
<div class="row">
<div class="col-sm-8">
    <a href="/"><img src="/images/logo/logo.jpg" width="70%"/></a>
</div>
<div class="col-sm-4">
<h1>
Магазин цифровой техники
</h1>
    <form id="search" action="/search" method="get">
          <input type="text" name="q" id = "search" placeholder="Поиск товара...">
        <input type="submit" value="Найти">
    </form>
    <br/>
    <div>
    @yield('header.right')
    </div>
</div>
</div>
<!-- -->