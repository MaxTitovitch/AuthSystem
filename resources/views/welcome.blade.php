@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление отзыва!</div>

                <div class="card-body">
                    @if (session()->has('messageServer'))
                        <div class="container text-center">
                            <span class="text-success">{{ session()->get('messageServer') }}</span>
                        </div>
                    @endif
                    <form action="{{ $redirectTo }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="username">Ваше имя:</label>
                        <input type="text" name="username" id="text" placeholder="Имя" required="" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ session()->get('username') ?? old('username')}}">
                        @if ($errors->has('username'))
                          <span class="invalid-feedback" role="alert">{{ $errors->first('username') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="email">E-mail адрес:</label>
                        <input type="email" name="email" id="email" placeholder="Адрес" required="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ session()->get('email') ?? old('email')}}">
                        @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="phone">Номер телефона:</label>
                        <input type="text" name="phone" id="phone" placeholder="Номер" required="" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{ session()->get('phone') ?? old('phone')}}">
                        @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="text">Сообщение:</label>
                        <textarea name="text" id="text" placeholder="Текст" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}">{{ session()->get('text') ?? old('text') }}</textarea>
                        @if ($errors->has('text'))
                          <span class="invalid-feedback" role="alert">{{ $errors->first('text') }}</span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
