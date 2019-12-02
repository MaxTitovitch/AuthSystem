@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Управление обращениями!</div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ИД</th>
                          <th scope="col">Имя</th>
                          <th scope="col">Почта</th>
                          <th scope="col">Телефон</th>
                          <th scope="col">Сообщение</th>
                          <th scope="col">Рассмотрение</th>
                          <th scope="col">Дата</th>
                          <th scope="col">Удалить</th>
                          <th scope="col">Изменить</th>
                          <th scope="col">История</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($applications as $application)
                        <tr>
                          <td>{{$application->id}}</td>
                          <td>{{$application->username}}</td>
                          <td>{{$application->email}}</td>
                          <td>{{$application->phone}}</td>
                          <td class="word-break">{{$application->text}}</td>
                          <td><a href="{{ route('overview', [$application->id]) }}">{{$application->overview}}</a></td>
                          <td>{{$application->created_at}}</td>
                          <td><a href="{{ route('delete', [$application->id]) }}">Удалить</a></td>
                          <td><a href="{{ route('edit', [$application->id]) }}">Изменить</a></td>
                          <td><a href="{{ route('editing', [$application->id]) }}">История</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
