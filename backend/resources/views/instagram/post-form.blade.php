@extends('layouts.app')

@section('content')
    <div class="container">
{{--        バリデーションエラー表示エリア--}}
        @if($errors->any())
            <div class="row justify-content-center">
                <div class="alert alert-danger">
                    <ul class="">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <form class="col-md-8" method="POST" action="/instagram/post/form" enctype="multipart/form-data">
                @csrf
                <div class="card card-file">
                    {{--                TODO foreachループでユーザ名のカードを追加--}}
                    <div class="card-body">
                        ファイルを追加
                        <input type="file" accept="image/png,image/jpeg,image/jpg, image/gif" name="photo"
                               class="custom-file-input" placeholder="ファイルをドラッグ＆ドロップしてください">
                    </div>
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
