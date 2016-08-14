<ul class="nav navbar-nav">
    <li><a href="/">О нас</a></li>
    <li><a href="/post/index">Новости</a></li>
    <li><a href="/contacts">Контакты</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
            <li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-registration-mark"></span> Регистрация</a></li>
        @else
            <li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-wrench"></span> Управление сайтом</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/auth/logout') }}">Выйти</a></li>
                </ul>
            </li>
        @endif
</ul>
<div class="row">
<div class="col-sm-8">
<div class="jumbotron">
    <img src="images/logo/logo.jpg" width="60%"/>
</div>
</div>
<div class="col-sm-4">
<h1>
Интернет магазин цифровой техники
</h1>
    <form id="search" action="search.php" method="get">
          <input type="text" name="q" placeholder="Поиск...">
        <input type="submit" value="Найти">
    </form>
</div>
</div>