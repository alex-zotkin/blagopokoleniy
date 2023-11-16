<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">

</head>
<body>

<div id="main">

    <section class="top_title">
        
        <ul class="menu_top_menu">
                <li><a href="{{route('about')}}">О нас </a></li>
                <li><a href="{{route('mission')}}">Цели </a></li>
                <li><a href="{{route('achievements')}}">Наши достижения </a></li>
                <li><a href="{{route('events_years')}}">Мероприятия </a></li>
                <li><a href="{{route('articles')}}">Новости </a></li>
                <li><a href="{{route('contacts')}}">Контакты </a></li>
                @if(!Auth::check())
                <li><a href="{{route('login')}}">Вход</a></li>
                @elseif(Auth::check())
                <li><a href="{{route('admin')}}" >АДМИНИСТРИРОВАНИЕ</a></li>
                @endif
            </ul>
    </section>

    <section class="menu_top">
        <a href="{{route('index')}}" class="logo"></a>

        <div class="menu_top_div">
            <h1 class="gradient-text">Будущее рядом с нами!</h1>
            <h3>АВТОНОМНАЯ НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ ПОДДЕРЖКИ СОЦИАЛЬНЫХ ИНИЦИАТИВ</h3>
        </div>
    </section>


    

    

    @yield('content')

    <section class="social">

    </section>


    <section class="footer">
    <ul class="menu_top_menu">
                <li><a href="{{route('about')}}">О нас </a></li>
                <li><a href="{{route('mission')}}">Цели </a></li>
                <li><a href="{{route('achievements')}}">Наши достижения </a></li>
                <li><a href="{{route('events_years')}}">Мероприятия </a></li>
                <li><a href="{{route('articles')}}">Новости </a></li>
                <li><a href="{{route('contacts')}}">Контакты </a></li>
            </ul>
    <span class="pravitelstvo">
        Сайт разработан при поддержке Правительства Ростовской области
    </span>

    <div class="megapolis_logo" style="background-image: url('{{URL::to('/')}}/public/imgs/megapolis.png')">

    </div>
    </section>
</div>

</body>

@yield('scripts')
</html>