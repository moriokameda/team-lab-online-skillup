@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-8" method="POST" action="/instagram/post/form">
                @csrf
                <div class="card card-file">
                    {{--                TODO foreachループでユーザ名のカードを追加--}}
                    <div class="card-body">
                        ファイルを追加
                        <input type="file" accept="image/png,image/jpeg,image/jpg, image/gif" name="photo" class="custom-file-input" placeholder="ファイルをドラッグ＆ドロップしてください" >
                    </div>

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="photo-area">--}}
{{--                            <img src="" alt="ここには投稿画像パスが表示">--}}
{{--                        </div>--}}
{{--                        <div class="caption-wrap">--}}
{{--                            <div class="caption">--}}
{{--                                --}}{{--                                キャプションを表示 --}}
{{--                            </div>--}}
{{--                            <a class="like">--}}
{{--                                <p>--}}
{{--                                    --}}{{--                            TODO　いいねしたユーザ数を表示--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            @guest--}}
{{--                                <a class="btn like-btn no-active">--}}
{{--                                    <img src="" alt="非活性の星ボタン">--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a class="btn like-btn">--}}
{{--                                    <img src="" alt="星ボタン">--}}
{{--                                </a>--}}
{{--                            @endguest--}}
{{--                        </div>--}}
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="caption-wrap">
                            <textarea class="caption" cols="80" rows="10" name="caption" maxlength="200">

                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="submit-wrap">
                    <input class="submit" type="submit" value="投稿">
                </div>
            </form>
        </div>
    </div>
@endsection
