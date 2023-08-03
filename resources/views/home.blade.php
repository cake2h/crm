<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
</head>
<body>
@if(Auth::check())
    Вы авторизированы как {{ Auth::user()->username}}
    <form method="POST" action="{{route('logout')}}">
        @csrf
        <input type="submit" value="Выйти">
    </form>
@endif

@if ($clients->isEmpty())
    <p>Нет доступных заявок.</p>
@else
    @foreach ($clients as $client)
        <div>
            <p>Номер заявки: {{ $client->id }}</p>
            <p>Имя: {{ $client->name }}</p>
            <p>Фамилия: {{ $client->lastName }}</p>
            <p>Телефон: {{ $client->phone }}</p>
            <p>Email: {{ $client->email }}</p>
                <form action="{{ route('update', $client->id) }}" method="post">
                    @csrf
                    <textarea name="comment">{{ $client->comment }}</textarea><br>
                    <input type="submit" value="Оставить комментарий">
                </form>
            <p>----------------------------------</p>
        </div>
    @endforeach
@endif

</body>
</html>
