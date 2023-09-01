@extends('layout')

@section('title')Статистика по пользователям@endsection

@section('main_content')
    <h1>
        Все пользователи
    </h1>
    <h3>
        Число пользователей: {{ $count }}
    </h3>
    <h3>
        Средний возраст пользователей: {{ $averageAge }}
    </h3>
    <br>
    
    <a href="/stats/popularNames" class="btn btn-primary" type="button">Просмотр наиболее популярных имен пользователей</a>

    <br><br>

    <form action="/stats/getUsersByName" method="get">
        <div class="col-sm-3">
            <label for="name" class="form-label">Поиск пользователя по имени</label>
            <input type="text" class="form-control" name="name" id="name" value="" />
        </div>
        <br>
        <div>
            <button class="btn btn-primary">Поиск пользователей</button>
        </div>
    </form>

    <br><br>
    <div class="col-sm-3">
            <div class="widget mercado-widget filter-widget price-filter">
               <h3 class="widget-title">Выберите диапазон</h3>
               <br><br>
               <form action="/stats/getUsersByAgeRange" method="get">
                  <div class="mall-property">
                     <div class="mall-slider-handles" data-start="20" data-end="60" data-min="10" data-max="80" data-target="age" style="width: 200%">
                     </div>
                           <input type="hidden" data-min="age" id="skip-value-lower" name="min" value="" readonly>  
                           <input type="hidden" data-max="age" id="skip-value-upper" name="max" value="" readonly>
                            <br><br><br>
                            <button type="submit" class="btn btn-primary">Поиск пользователей</button>
                  </div>
               </form>
            </div>
    </div>
    
    <script>
    $(function () {
            var $propertiesForm = $('.mall-category-filter');
            var $body = $('body');
            $('.mall-slider-handles').each(function () {
                var el = this;
                noUiSlider.create(el, {
                    start: [el.dataset.start, el.dataset.end],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: [parseInt(el.dataset.min)],
                        max: [parseInt(el.dataset.max)]
                    },
                    pips: {
                        mode: 'range',
                        density: 20
                    }
                }).on('change', function (values) {
                    $('[data-min="' + el.dataset.target + '"]').val(values[0])
                    $('[data-max="' + el.dataset.target + '"]').val(values[1])
                    $propertiesForm.trigger('submit');
                });
            })
        })     
    </script>

    <br>
    <br>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Возраст</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->age}}</td>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->second_name }}</td>
                </tr> 
                @endforeach                       
            </tbody>
        </table>
      </div>
@endsection