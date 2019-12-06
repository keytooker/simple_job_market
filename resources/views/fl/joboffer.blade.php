@extends('layouts.fl')

@section('content')
    <br>
    <div>
    Форма заявки о работе
    </div>
    <br>
    <div>

        <form method="POST" action="{{ route('joboffer') }}">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Заголовок') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <p><textarea name="offer" placeholder="Подробности"></textarea></p>
            </div>



            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Разместить') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
