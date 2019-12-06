@extends('layouts.fl')

@section('content')
    <div>
    @if(isset($offers))

        <br>
        @if(sizeof($offers) == 0)
            <div>Вы не размещали вакансий</div>
            @else
        <div>
            <strong>Вакансии от вас</strong>
        </div>
        <br>
        <table>
            <th>Номер</th>
            <th>Заголовок</th>
            <th>Страница вакансии</th>
            @foreach($offers as $offer)
                <tr>
                    <td align="center">{{$offer->id}}</td>
                    <td>{{$offer->title}}</td>
                    <td><a href="/job/{{$offer->id}}"><i>Перейти</i></a></td>
                </tr>
            @endforeach
        </table>
            @endif
    @endif
    </div>
    <br>

@endsection
