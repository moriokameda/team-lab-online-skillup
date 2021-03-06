@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('新規登録') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="provider_id" value="{{ $provider_id ?? '' }}">
                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール画像') }}</label>

                                <div class="col-md-6">
                                    @if(isset($avatar))
                                        <img src="{{$avatar}}" v-model="avatar"> <br>
                                        <input id="provider_avatar" type="hidden" value="{{ $avatar }}" name="provider_avatar">
                                        <input id="avatar" type="file" class="form-control" @error('avatar') is-invalid
                                               @enderror name="avatar"
                                               accept="image/*">
                                    @else
                                        <input id="avatar" type="file"
                                               class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                                               accept="image/*">
                                    @endif
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                                <div class="col-md-6">
                                    @if(isset($name))
                                        <input id="name" type="text" class="form-control" @error('name') is-invalid
                                               @enderror name="name" value="{{ $name }}" required autocomplete="name"
                                               autofocus>
                                    @else
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @endif
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>

                                <div class="col-md-6">
                                    @if(isset($nickname))
                                        <input id="name" type="text" class="form-control" @error('nickname') is-invalid
                                               @enderror name="nickname" value="{{ $nickname }}" required autocomplete="name"
                                               autofocus>
                                    @else
                                        <input id="name" type="text"
                                               class="form-control @error('nickname') is-invalid @enderror" name="nickname"
                                               value="{{ old('nickname') }}" required autocomplete="name" autofocus>
                                    @endif
                                    @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6">
                                    @if(isset($email))
                                        <input id="email" type="email" class="form-control" @error('email') is-invalid
                                               @enderror name="email" value="{{ $email }}" required
                                               autocomplete="email">
                                    @else
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">
                                    @endif
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('登録') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ url('login/github') }}">
                                <button type="button" class="btn btn-primary"><i class="fab fa-twitter"></i> GitHubアカウントで登録</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
