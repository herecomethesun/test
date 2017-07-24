<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <title>Веник каждому!</title>
</head>
<a href="/visitors">На главную</a>
<body>
<p><strong>ФИО:</strong> {{ $visitor->name }}</p><br>
<p><strong>Дата рождения:</strong> {{ $visitor->Data }}</p><br>
<p><strong>Количество купленных веников</strong> {{ $visitor->count }}</p><br>
<p><strong>Адрес:</strong> <div id="coords">{{ $visitor->place }}</div></p>
<div id="map" style="width: 600px; height: 400px">
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap,
        myPlacemark;
        function init()
        {
            myMap = new ymaps.Map("map", {
                center: [47.42018, 40.09132],
                zoom: 14
            }
            );
            var cord = $('#coords').text()
            var myGeocoder = ymaps.geocode(cord);
            myGeocoder.then(
                    function (res) {
                        myMap.geoObjects.add(res.geoObjects);
                        var adres = result.geoObjects.get(0).properties.get('metaDataProperty').getAll(); // записываю координаты в переменную
                        myPlacemark = new ymaps.Placemark([adres], { // пытаюсь передать координаты и поставить метку
                            hintContent: 'Москва!',
                            balloonContent: 'Столица России'
                        });
                        myMap.geoObjects.add(myPlacemark);
                    },
                    function (err) {
                        // обработка ошибки
                    }
            );
        }
    </script>

    <form action="/openForm" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    <a href="{{ $visitor->id }}/edit">Редактировать запись</a>
    <a href="{{ $visitor->id }}/delete">Удалить запись</a>
</div>
</body>
</html>
