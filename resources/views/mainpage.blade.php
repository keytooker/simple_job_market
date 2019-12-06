@extends('layouts.fl')
@section('content')

    @if(isset($jobs))
        <br>
        <div>
            <p><strong>Открытые проекты</strong></p>
        </div>
        @foreach($jobs as $job)
            <div>
                <p><strong>{{$job->title}}</strong></p>
                <article>{{$job->offertext}}</article>
                <p><a href="/job/{{$job->id}}/">Подробнее</a></p>
                <p>Опубликовано {{$job->updated_at->format('Y.m.d')}}</p>
            </div>
            <hr>
        @endforeach
        <br>
    @else
        <div>Нет вакансий</div>
    @endif

@endsection

