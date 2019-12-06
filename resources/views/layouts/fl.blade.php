<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Биржа Фриланса</title>

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111111;
        }

        .brd {
            border: 4px double black; /* Параметры границы */
            background: #4dc0b5; /* Цвет фона */
            padding: 10px; /* Поля вокруг текста */
        }

        .page-footer {
            background-color: lightcyan;
        }
    </style>
</head>
<body>
<header>
    <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="/account/">Личный кабинет</a></li>
        @if( isset($role_id) and ($role_id == 1) )
            <li><a href="/joboffer">Разместить вакансию</a></li>
        @endif



            @if( isset($auth) and ($auth) )
            <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
            @else
            <li>
                <a class="dropdown-item" href="{{ route('login') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('login-form').submit();">
                    {{ __('Войти') }}
                </a>

                <form id="login-form" action="{{ route('login') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            <li>
                <a href="/register"
                   onclick="event.preventDefault();
                                                     document.getElementById('regform').submit();">
                    {{ __('Зарегистрироваться') }}
                </a>

                <form id="regform" action="/register/" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </li>
    </ul>
</header>
<main>
    <div>
        @yield('content')
    </div>
</main>
<footer class="page-footer pink lighten-90">
    <div>
        Биржа фриланса
    </div>
</footer>
</body>
</html>
