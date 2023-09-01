@extends('layout')

@section('title')Статистика по пользователям@endsection

@section('main_content')
    <h1>
        Все пользователи
    </h1>
    <h3>
        Число пользователей: {{ $count }}
    </h3>
    <br>
    
    <a href="/stats/popularNames" class="btn btn-primary" type="button">Просмотр наиболее популярных имен пользователей</a>

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