<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <!-- <input type="text" name="name" value="{{ old('name') }}" required>
    @if ($errors->has('name'))
        {{ $errors->first('name') }}
    @endif -->

    <input type="email" name="email"  required placeholder="email">


    <input type="password" name="password" required placeholder="Пароль">


    <!-- <input type="password" name="password_confirmation" required placeholder="Подтверждение пароля"> -->

    <input type="submit" value="Зарегистрироваться">
</form>