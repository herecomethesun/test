<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')
<body>
<h2 align="center">Реестр учета посетителей компании "Веник каждому!"</h2>
<div class="main_div">
    <div class="order_div">
        <form action="/visitors" method="POST">
            <p>Фильтры:</p>
            <p><input name="count" placeholder="Мин. кол-во купл. веников"><br>
            <p>Сортировать:</p>
            <select name="select" size="3" multiple>
                <option selected value="s1">По дате создания</option>
                <option value="s2">По возрасту</option>
                <option value="s3">По кол-ву купленных веников</option>
            </select>
            <p><input type="submit"></p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a  href="/visitors/create">Создать новую запись</a>
        </form>
    </div>
    <div class="table_div">
        <table>
            @foreach ($visitors as $visitor)
                <tr><a href="visitors/{{ $visitor->id }}">
                        <p>{{ $visitor->name }}</p>
                    </a></tr>
            @endforeach
        </table>
    </div>
</div>
</body>
@section('form')
@endsection
</html>

