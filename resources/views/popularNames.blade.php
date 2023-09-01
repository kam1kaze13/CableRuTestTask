@extends('layout')

@section('title')Статистика по пользователям@endsection

@section('main_content')
    <h1>
        Наиболее популярные имена
    </h1>
    <h3>
        {{ $count }} самых популярных имен
    </h3>
    <br>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Количество</th>
                <th scope="col">Имя</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->count}}</td>
                    <td>{{ $user->first_name}}</td>
                </tr> 
                @endforeach                       
            </tbody>
        </table>
      </div>
@endsection