<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Администрирование // Благополучие поколений</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/admin-layout.css')}}">
</head>
<body>
    <div class="admin_top">
        <a href="{{route('index')}}">Перейти на сайт</a>
        <p>Здравствуйте, {{Auth::user()['email']}} &nbsp;&nbsp;&nbsp; <a href="{{route('logout')}}" style="color: darkblue;">(ВЫЙТИ)</a></p>
    </div>

    <div class="title">
        <h1><a href="{{route('admin')}}">Администрирование</a></h1>
    </div>
    <div class="pre_title">
      <h1>@yield('bread')</h1>
    </div>

    <div class="admin_block">
        @yield('content')
    </div>

</body>

<script>
    function preload(){
        var elem = document.createElement('div');
        elem.className = 'preload';
        elem.innerText = 'Загрузка...'
        document.body.appendChild(elem);
    }

    var del = document.getElementsByClassName('button_delete');

for (var i = 0; i < del.length; i++) {
    del[i].onclick = function(e){
        if(confirm('Это действие невозможно отменить! Продолжить?')){
            preload()
        } else{
            e.preventDefault();
        }
    }

}

</script>
</html>