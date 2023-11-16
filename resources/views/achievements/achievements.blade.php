<link rel="stylesheet" href="{{asset('css/achievements/achievements.css')}}">
@extends("../layouts/index-layout");

@section('title', 'Достижения // Благополучие поколений')

@section('content')

<section class="title">
    <h1>Достижения</h1>
</section >

<section class="achievements_block">

    <div class="diplomas">
        @foreach($imgs as $img)
        
            <a href='{{URL::to("/")}}/public/imgs/achievements/{{$img}}' class="fresco"  data-fresco-group="achievements" >
                <img src='{{URL::to("/")}}/public/imgs/achievements/{{$img}}'>
            </a>
        @endforeach
        
    </div>

</section>


<section class="title title_docs">
    <h1>Отчетные документы</h1>
</section >

<section class="docs">
    @foreach($docs as $doc)
        <a href='{{URL::to("/")}}/public/imgs/achievements/pdf/{{$doc}}' target="_blank">
            <img src='{{URL::to("/")}}/public/imgs/pdf_ico.png' width="27px">&nbsp;&nbsp;&nbsp;{{$doc}}
        </a>
    @endforeach
</section>

@stop



@section('scripts')

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/fresco/fresco.css')}}">
    <script type="text/javascript" src="{{asset('js/fresco/fresco.js')}}"></script>

@stop