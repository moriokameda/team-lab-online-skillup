@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                TODO foreachループでユーザ名のカードを追加--}}
                    <div class="card-header">
                        ユーザ名:
                        <span class="user-name">ユーザ名</span>
                        @auth()
                            <div class="btn">
                                <a href="" class="btn">投稿を削除</a>
                            </div>
                        @endauth
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="photo-area">
                            <img src="" alt="ここには投稿画像パスが表示">
                        </div>
                        <div class="caption-wrap">
                            <div class="caption">
{{--                                キャプションを表示 --}}
                            </div>
                            <a class="like">
                                <p>
                                    {{--                            TODO　いいねしたユーザ数を表示--}}
                                </p>
                            </a>
                            @guest
                                <a class="btn like-btn no-active">
                                    <img src="" alt="非活性の星ボタン">
                                </a>
                            @else
                                <a class="btn like-btn">
                                    <img src="" alt="星ボタン">
                                </a>
                            @endguest
                        </div>

                    </div>
                </div>
                <div class="prev-next-area">
                    <div class="prev-area">
                        <button class="prev btn">前へ</button>
                    </div>
                    <div class="next-area">
                        <button class="next btn">次へ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
