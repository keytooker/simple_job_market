@extends('layouts.fl')

@section('content')
    <p>
    @if( isset($message) and ($message != '') )

       <div>
           <strong>{{$message}}</strong>
       </div>

    @endif
    </p>
    <div class="brd">
        <div>
            <strong>
            {{$offer->title}}
            </strong>
        </div>
            <div>
                {{$offer->offertext}}
            </div>
    </div>

    @if(isset($responds))
        <br>
        <div>Отклики фрилансеров:</div>
        <br>
        @foreach($responds as $respond)
            <div>{{$respond->name}}:</div>
            <div>"{{$respond->letter}}"</div>
            @if( isset($isAuthor) and ($isAuthor) )
                <form>
                    Форма с кнопкой нанять
                    <div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Нанять исполнителя') }}
                        </button>
                    </div>
                </form>
            @endif
            <hr>
            <br>
        @endforeach
    @endif

@if(isset($contractor_id))
    <div>
        <hr>
        <form method="POST" action="{{  route('respond', $offer->id) }}">
            @csrf
            <div class="form-group row">
                <p><textarea name="respondtext" placeholder="Текст отклика"></textarea></p>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Откликнуться') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endif


@endsection
