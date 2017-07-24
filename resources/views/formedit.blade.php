<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')
<body>
<a href="/visitors/{{ $visitor->id }}">Назад</a>
<form action="/visitors/{{ $visitor->id }}" method="POST">
    <p><input name="name" placeholder="ФИО"><br>
        <input name="Data" placeholder="Дата рождения (year-month-day)"><br>
        <input name="Place" placeholder="Адрес"><br>
        <input name="count" placeholder="Количество веников"></p>
    <p><input type="submit"></p>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

</body>
</html>
