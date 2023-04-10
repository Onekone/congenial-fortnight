@extends('components.layout')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login.auth') }}">
            @csrf
            <div class="form-group">
                <label for="login">Введите свой вопрос</label>
                <input type="text" class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }}" id="login"
                       name="login" aria-describedby="loginHelp" placeholder="Введите логин" value="{{ old('login') }}">
            </div>

            <button type="submit" class="btn btn-primary form-control">Получить ответ</button>
        </form>
    </div>
@endsection
