<link rel="stylesheet" href="{{asset('css/admin/admin-achivements.css')}}">
@extends("../layouts/admin-layout")

@section('bread')
    <div><a href="{{route('admin')}}">Администрирование</a>&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;<a href="{{route('adminAchievements')}}"> Достижения</a></div>
@stop

@section('content')

<section class="block">
    <div class="achievements_block">
        <!-- <a href="" class="button">Добавить грамоты + </a> -->
        <form action="{{route('adminAchievementsAdd')}}" enctype="multipart/form-data" id="form_img">
        {{ csrf_field() }}
        
        <!-- <div class="form-group">
            <input type="file" multiple name="img" accept="image/*">
            <button type="submit" class=""></button>
        </div> -->

        <div class="file-upload">
            <label id="button_add_achievement">
                <input type="file" multiple name="imgs[]" accept="image/*">
                
                <button type="submit" class="button" >+ Добавить грамоты  </button>
            </label>
        </div>
        
        
    </form>
        <div class="achievements">

        
        <table>
            <colgroup>
                <!-- <col span="2" style="background:Khaki">
                <col style="background-color:LightCyan"> -->
            </colgroup>
            <tr>
                <th>№</th>
                <th>Изображение</th>
                <th>Название</th>
                <th colspan="1" >Действия</th>
        @foreach($imgs as $index => $img)
            </tr>
            <tr>
                <td valign="middle"  align="center">{{$index + 1}}</td>
                <td valign="middle"  align="center"><img src='{{URL::to("/")}}/public/imgs/achievements/{{$img}}' width="60px"></td>
                <td valign="middle"  align="center" >{{$img}}</td >
                <td valign="middle"  align="center" style="color: red;" ><a href="{{route('adminAchievementsDelete', $img)}}" style="text-decoration: none;" class="button_delete"><img src='{{URL::to("/")}}/public/imgs/close.png' width="15px" >&nbsp;&nbsp;Удалить</a></td>
            </tr>
        @endforeach
        </table>
        

        </div>
    </div>

    <div class="docs_block" >
        <form action="" enctype="multipart/form-data" method="post" id="form_doc">
            {{ csrf_field() }}
            
           

            <div class="file-upload" id="button_add_docs">
                <label>
                    <input type="file" multiple name="docs[]">
                    <button class="button"> + Добавить документы  </button>
                </label>
            </div>
            </form>

        <table>
            
            <tr>
                <th>№</th>
                <th>Название</th>
                <th colspan="1" >Действия</th>
        @foreach($docs as $index => $doc)
            </tr>
            <tr>
                <td valign="middle"  align="center">{{$index + 1}}</td>
                <td valign="middle"  align="center" >{{$doc}}</td >
                <td valign="middle"  align="center" style="color: red;" ><a href="{{route('adminAchievementsDeleteDoc', $doc)}}" style="text-decoration: none;" class="button_delete"><img src='{{URL::to("/")}}/public/imgs/close.png' width="15px"  >&nbsp;&nbsp;Удалить</a></td>
            </tr>
        @endforeach
        </table>
        </div>
        


        
</section>

@stop

<script>

    window.onload = function(){
        var form_img = document.getElementById('form_img');
        var request = new XMLHttpRequest();
        
        form_img.addEventListener('submit', function(e){
            e.preventDefault();
            var formData = new FormData(form_img);
            request.open('post', "{{route('adminAchievementsAdd')}}")
            preload();
            request.addEventListener('load', function(){
                location.reload()
            });
            request.send(formData);
        });
        


         var form_doc = document.getElementById('form_doc');
         
        form_doc.addEventListener('submit', function(e){
            var request = new XMLHttpRequest(); 
            e.preventDefault();
            var formData = new FormData(form_doc);
            request.open('post', "{{route('adminAchievementsAddDocs')}}")
            preload();
            request.addEventListener('load', function(){
                location.reload()
            });
            request.send(formData);
        });




        


    }

    
</script>