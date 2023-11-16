<link rel="stylesheet" href="{{asset('css/admin/admin-news.css')}}">
@extends("../layouts/admin-layout")

@section('bread')
    <div><a href="{{route('admin')}}">Администрирование</a>&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;<a href="{{route('adminNews')}}">Новости</a></div>
@stop

@section('content')

<section class="block">
    <div class="button_block">

                <a href="{{route('adminNewsAdd')}}" class="button" >+ Создать новость  </a>
                </div>
        <div class="events">
    
        
        <table>
            <colgroup>
                <!-- <col span="2" style="background:Khaki">
                <col style="background-color:LightCyan"> -->
            </colgroup>
            <tr>
                <th>Дата</th>
                <th>Изображение</th>
                <th>Заголовок</th>
                <th colspan="2" >Действия</th>
        
            </tr>

            @foreach($news as $new)
            <tr>
                <td valign="middle"  align="center">{{$new['created_at']}}</td>
                <td valign="middle"  align="center"><img width="130" src="{{URL::to('/')}}/public/imgs/news/{{$new['imgName']}}" alt=""></td>
                <td valign="middle"  align="center"><b>{{$new['title']}}</b></td>
                {{--<td valign="middle"  align="center" style="color: blue;" ><a href="" style="text-decoration: none;"><img src='{{URL::to("/")}}/public/imgs/edit.png' width="18px" >&nbsp;&nbsp;Редактировать</a></td>--}}
                <td valign="middle"  align="center" style="color: red;" ><a href="{{route('adminNewsDelete', $new['id'])}}" style="text-decoration: none;" class="button_delete"><img src='{{URL::to("/")}}/public/imgs/close.png' width="15px" >&nbsp;&nbsp;Удалить</a></td>
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