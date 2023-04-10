@extends('components.layout')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('questions.ask') }}">
            @csrf
            @include('components.input',['id' => 'question', 'tooltip' => 'Введите свой вопрос', 'placeholder' => 'Буду ли я богат'])
            <button type="submit" class="btn btn-primary form-control">Получить ответ</button>
        </form>

        @if($question ?? null)
            <div class="form-group mt-96" style="margin-top: 4rem">
                <p>Ответ</p>
                <p class="form-control text-xl text-center" style="font-size: 4rem">{{ $question->result->content }}</p>
            </div>

            <div class="form-group mt-96 flex justify-center"
                 style="margin-top: 4rem; display: flex; justify-content: center; align-items: center">
                <div>
                    <p>Этот вопрос задавали раз</p>
                    <p class="form-control text-xl text-center" style="font-size: 4rem">{{ $stats->count() }}</p>
                </div>
                <div>
                    <p>От вас оно было</p>
                    <p class="form-control text-xl text-center"
                       style="font-size: 4rem">{{ $stats->where('user_id',auth()->id())->count() }}</p>
                </div>
            </div>
        @endif
    </div>
    <style>
        .flex.justify-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .flex.justify-center div {
            width: 50%;
        }
    </style>
@endsection
