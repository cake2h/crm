<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лэндинг</title>
</head>
<body>
<h1>Оставьте заявку</h1>

<a href="/login" style="position: absolute; margin-left: 15%; margin-top: -2.6%">Войти как менеджер</a>

<form method="post" action="{{route('store')}}">
    @csrf

    <label for="name">Имя</label><br>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    @error('name')
    Ошибка: {{$message}}
    @enderror<br><br>

    <label for="lastName">Фамилия</label><br>
    <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required>
    @error('lastName')
    Ошибка: {{$message}}
    @enderror<br><br>

    <label for="phone">Телефон</label><br>
    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
    @error('phone')
    Ошибка: {{$message}}
    @enderror<br><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    @error('email')
    Ошибка: {{$message}}
    @enderror<br><br>

    <input type="submit" value="Отправить">

    @if(session('success'))
        {{ session('success') }}
    @endif
</form>
</body>
</html>

