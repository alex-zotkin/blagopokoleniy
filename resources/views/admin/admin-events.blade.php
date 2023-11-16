<link rel="stylesheet" href="{{asset('css/admin/admin-events.css')}}">
@extends("../layouts/admin-layout")

@section('bread')
    <div><a href="{{route('admin')}}">Администрирование</a>&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;<a href="{{route('adminEvents')}}"> Мероприятия</a></div>
@stop

@section('content')

<section class="block">
    <div class="button_block">

                <a href="{{route('adminEventsAdd')}}" class="button" >+ Создать новое мероприятие  </a>
                </div>
        <div class="events">
    
        
        <table>
            <colgroup>
                <!-- <col span="2" style="background:Khaki">
                <col style="background-color:LightCyan"> -->
            </colgroup>
            <tr>
                <th>Год</th>
                <th>Название мероприятия</th>
                <th colspan="2" >Действия</th>
        
            </tr>
            @foreach($events as $event)
            <tr>
                <td valign="middle"  align="center">{{$event['created_at']->year}}</td>
                <td valign="middle"  align="center">{{$event['eventName']}}</td>
                {{--<td valign="middle"  align="center" style="color: blue;" ><a href="{{route('adminEventsEdit', [$event['created_at']->year, $event['eventName']])}}" style="text-decoration: none;"><img src='{{URL::to("/")}}/public/imgs/edit.png' width="18px" >&nbsp;&nbsp;Редактировать</a></td>--}}
                <td valign="middle"  align="center" style="color: red;" ><a href="{{route('adminEventsDelete', [$event['created_at']->year, $event['eventName']])}}" style="text-decoration: none;" class="button_delete"><img src='{{URL::to("/")}}/public/imgs/close.png' width="15px" >&nbsp;&nbsp;Удалить</a></td>
            </tr>
            @endforeach
       
        </table>
        

        
    </div>

   
@stop

<script>

    // window.onload = function(){
    //     var form_img = document.getElementById('form_img');
    //     var request = new XMLHttpRequest();
        
    //     form_img.addEventListener('submit', function(e){
    //         e.preventDefault();
    //         var formData = new FormData(form_img);
    //         request.open('post', "{{route('adminAchievementsAdd')}}")
    //         preload();
    //         request.addEventListener('load', function(){
    //             location.reload()
    //         });
    //         request.send(formData);
    //     });
        


    //      var form_doc = document.getElementById('form_doc');
         
    //     form_doc.addEventListener('submit', function(e){
    //         var request = new XMLHttpRequest(); 
    //         e.preventDefault();
    //         var formData = new FormData(form_doc);
    //         request.open('post', "{{route('adminAchievementsAddDocs')}}")
    //         preload();
    //         request.addEventListener('load', function(){
    //             location.reload()
    //         });
    //         request.send(formData);
    //     });




        


    // }

    
</script>