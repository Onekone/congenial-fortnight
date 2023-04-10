@extends('components.layout')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login.auth') }}">
            @csrf
            @include('components.input',['id' => 'login', 'tooltip' => 'Логин', 'help' => 'Если ваш логин еще не занят, то вас автоматически зарегистрирует в нем'])
            @include('components.input',['id' => 'password', 'tooltip' => 'Пароль', 'type' => 'password'])
            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember"
                       @if(old('remember')) checked @endif>
                <label class="form-check-label" for="remember">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary">Войти/зарегистрироваться</button>
            <a href="{{ route('login.socialite.index', ['driver' => 'vkontakte']) }}" class="btn btn-primary">Вход по
                ВК</a>
        </form>
    </div>
@endsection
