@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="profile_wrap">
                    <div class="profile_icon">
                        <img src="" alt="プロフィール画像">
                    </div>
                    <div class="profile_name">
                        <p>ユーザ名</p>
                    </div>
                    <div class="profile_likes">
                        <p>いいね合計数</p>
                    </div>
                </div>
            </div>
        </div>
{{--        TODO ループ--}}
        <div class="row">
            <div class="col-4">
                <img src=""alt="投稿写真">
            </div>
        </div>
    </div>
@endsection
