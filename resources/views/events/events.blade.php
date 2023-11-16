<link rel="stylesheet" href="{{asset('css/events/events.css')}}">
@extends("../layouts/index-layout");

@section('title', 'Мероприятия // Благополучие поколений')

@section('content')

<section class="title">
        <h1>Мероприятия</h1>
    </section >

<section class="events_block">
    <div class="events">
        <div class="events_years_list">
            <ul>
               
            @foreach ($eventsYears as $Y)

                <li><a href="{{route('events', $Y)}}"><div class="link">{{$Y}}</div></a></li>
                
            @endforeach
            </ul>
        </div>

        @if($year != null)
            <div class="events_list" id="events_list">
            
                <ul>
                
                @foreach ($events_list as $event)
                    
                    <li><a href="{{route('event', [$year, $event['id']])}}"><div class="link">{{$event['eventName']}}</div></a></li>
                    
                @endforeach
                </ul>
                
            </div>
        @endif

        <div class="event_photo" >
            @if($year == null)
                <h1>Для просмотра фотографий выберите год в левой колонке</h1>
            @elseif($id == null)
                <h1>Выберите мероприятие, проходившее в {{$year}} году</h1>

            @elseif($year != null and $id != null)
            <div class="photos">
                
                    @foreach($imgs as $img)
                        <a href='{{URL::to("/")}}/public/imgs/events/{{$year}}/{{$name}}/{{$img}}' class="fresco" data-fresco-group="events" data-fresco-options="ui: 'inside'">
                            <img src='{{URL::to("/")}}/public/imgs/events/{{$year}}/{{$name}}/{{$img}}' alt="">
                        </a>
                    @endforeach
               
            </div>
            @endif

            
            
        </div>
    </div>
</section>

@stop


@section('scripts')
<script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="{{asset('css/fresco/fresco.css')}}">
<script type="text/javascript" src="{{asset('js/fresco/fresco.js')}}"></script>
<script>
    
    function setSize(){
        var max;
        var years = document.querySelector('.events_years_list');
        var list = document.getElementById('events_list');
        var photos = document.querySelector('.event_photo');
        

        if(list){
            max = Math.max(years.offsetHeight, photos.offsetHeight, list.offsetHeight);
            years.style.height = max;
            photos.style.height = max;
            list.style.height = max;
        }
        else{
            max = Math.max(years.offsetHeight, photos.offsetHeight);
            years.style.height = max;
            photos.style.height = max;
            photos.style.width = document.querySelector('.events').offsetWidth - years.offsetWidth - 10;
        }
        
    }

    function activeLink(){
        var el = document.querySelector('.events_list').getElementsByTagName('a');
        var url = document.location.href;
        for(var i=0; i<el.length; i++){
            if (url==el[i].href){
            el[i].getElementsByTagName('div')[0].classList.add("active");

            }
        }


        var el_year = document.querySelector('.events_years_list').getElementsByTagName('a');
        for(var j=0; j<el_year.length; j++){
            if (url.includes(el_year[j].href)){
                el_year[j].getElementsByTagName('div')[0].classList.add("active");

            }
        }
    }

    
    window.onload = function(){
        // console.clear();
        setSize();
        activeLink();
        
        
        
    }

    window.onresize = function(){
        setSize()
    }

    
</script>

@stop