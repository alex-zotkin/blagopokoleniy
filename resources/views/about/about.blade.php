<link rel="stylesheet" href="{{asset('css/about/about.css')}}">
@extends("../layouts/index-layout")

@section('title', 'О нас // Благополучие поколений')

@section('content')

<section class="title">
    <h1>О нас</h1>
</section >

<section class="about_block">

<div class="about">
   <b>Автономная Некоммерческая Организация Поддержки Социальных Инициатив «Благополучие поколений» - </b>создана в 2007 году людьми, живущими с ВИЧ, а также сопричастными и небезразличными к проблеме ВИЧ/СПИДа. Нашими первыми шагами было создание нескольких сервисных услуг, направленных на помощь и поддержку ВИЧ-положительных женщин и их детей. А объединение женщин получило название Женский клуб «Надежда» и по сей день является одним из направлений деятельности АНОПСИ «Благополучие поколений».<br><br>
    Юридический статус  организация получила 1 апреля 2008 года. Любая некоммерческая общественная организация проходит сложный путь от объединения людей, связанных огромным желание идти вместе к реализации единых целей, до организации, прошедшей государственную регистрацию и вошедшую в единый государственный реестр. По этой причине именно в этот день мы празднуем день Рождения своей организации.   <br><br>
    Все наши сотрудники имеют опыт работы в СПИД-сервисе от 4-х до 6-ти лет. Каждый прошел множество сертифицированных обучающих мероприятий по различным направлениям, от проведения групп взаимопомощи ЛЖВ (Люди, Живущие с ВИЧ) и «равного» консультирования, до работы с особо-уязвимыми группами к ВИЧ, от проведения мониторинга и оценки проектной деятельности, до адвокации прав целевых групп.  
    В 2017 году вошли в состав Донского Антинаркотического фронта.
</div>

</section>

<section class="title">
    <h1>Наши партнеры</h1>
</section >


<section class="partners_block">

    <div class="partners">
        @foreach($partners as $partner)
            <img src='{{URL::to("/")}}/public/imgs/partners/{{$partner}}' alt="" width="140px">
        @endforeach
        <img src='{{URL::to("/")}}/public/imgs/partners/medics.png' alt="" width="620px">
        <img src='{{URL::to("/")}}/public/imgs/partners/rbn.png' alt="" width="480px">
    </div>

</section>
@stop



<!-- @section('scripts')

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/fresco/fresco.css')}}">
    <script type="text/javascript" src="{{asset('js/fresco/fresco.js')}}"></script>

@stop -->