<link rel="stylesheet" href="{{asset('css/admin/admin-index.css')}}">
@extends("../layouts/admin-layout")

@section('bread', 'Выберите категорию, которую хотите изменить')

@section('content')

<section class="choice_block">
    <div class="choice">
        <ul>
            <li><a href="{{route('adminAchievements')}}">Наши достижения</a></li>
            <li><a href="{{route('adminEvents')}}">Мероприятия</a></li>
            <li><a href="{{route('adminNews')}}">Новости</a></li>
        </ul>
    </div>
</section>

@stop