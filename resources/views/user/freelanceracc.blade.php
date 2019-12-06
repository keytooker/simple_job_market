@extends('layouts.fl')

@section('content')
    <div>

    @if( isset($userResponds))
        <div><p><strong>Ваши отклики</strong></p></div>
        <table>
        <tr>
            <th> Номер заявки </th>
            <th> Текст </th>
            <th> Вакансия </th>
            <th> Cтатус </th>
        </tr>
        @foreach($userResponds as $respond)
            <div>
            <p>
                <tr>
                    <td align="center">{{$respond->id}}</td>
                    <td>{{$respond->letter}}</td>
                    <td><a href="/job/{{$respond->offer_id}}">Перейти</a></td>
                    <td><i>Ожидает утверждения</i></td>
            </tr>
            </p>
            </div>
        @endforeach
        </table>
    @endif
    </div>
    <br>

@endsection
