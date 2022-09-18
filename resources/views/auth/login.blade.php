
@extends('auth.index')
@section('content')
    <div class="card fat">
        <div class="card-body">
            <h4 class="card-title">Đăng nhập</h4>

            @if (session('error-login'))
                <div class="alert alert-danger">{{ session('error-login') }}</div>
            @endif
            @if (session('message-logout'))
                <div class="alert alert-danger">{{ session('message-logout') }}</div>
            @endif
            @if (session('error-permitsion'))
                <div class="alert alert-danger">{{ session('error-permitsion') }}</div>
            @endif
            {!! Form::open([
                'method' => 'POST',
                'url' => route("auth/postLogin"),
                'id' => 'auth-form',
            ]) !!}

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Mật khẩu') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => true, 'data-eye' => true]) !!}
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-block">
                    Đăng nhập
                </button>
            </div>
            <div class="form-group ">
                <a type="button" class="btn btn-danger btn-block" href="{{ route('home/frontend') }}">
                    Trở về Website
                </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
