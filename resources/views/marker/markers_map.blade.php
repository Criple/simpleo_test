<x-guest-layout>
    <div id="map" style="width: 100%; height: 400px"></div>

    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('marker.index') }}">К маркерам</a>
    </div>

    <script>
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                center: [54.99, 73.37],
                zoom: 13
            });

            myMap.geoObjects
                @foreach ($markers as $marker)
                    .add(new ymaps.Placemark([{{ $marker->lon }}, {{ $marker->lat }}], {
                        balloonContent: 'Телефон: {{ $marker->tel }}</br>Описание: {{ $marker->description }}'
                    }))
                @endforeach

        }
    </script>

</x-guest-layout>
