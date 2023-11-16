@extends("../layouts/auth-layout");

@section('title', 'Вход')

@section('content')

<form method="POST" action="{{ route('login') }}" class="form">
    {{ csrf_field() }}
    <ul>

        <li>
            <a href="{{ route('index') }}"><img src='{{URL::to("/")}}/public/imgs/back.png' width="25px" alt="На главную"></a>&nbsp;&nbsp;&nbsp;<h1>Вход</h1>
        </li>

        

        <li>
         <input class="first" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
            <!-- @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif -->
        </li>

        <li>
            <input class="last" type="password" name="password" required placeholder="Пароль">
            <!-- @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif -->
        </li>

        <li>
            <input type="submit" value="Войти" class="button">
        </li>
    </ul>


</form>

@stop

