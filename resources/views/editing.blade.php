@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Просмотр истории!</div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ИД</th>
                          <th scope="col">Имя Админа</th>
                          <th scope="col">Имя Обращающегося</th>
                          <th scope="col">Обращение</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($editings as $editing)
                        <tr>
                          <td>{{$editing->id}}</td>
                          <td>{{$editing->user->name}}</td>
                          <td>{{$editing->application->username}}</td>
                          <td class="word-break">{{$editing->application->text}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <a href="{{ route('home') }}">Назад</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
