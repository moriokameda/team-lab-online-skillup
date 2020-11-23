@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                @foreach($user as $user)
                    <div class="profile_wrap">
                        <div class="profile_icon">
                            <img src="{{$user->avatar}}" alt="プロフィール画像">
                        </div>
                        <div class="profile_name">
                            <p>{{$user->name}}</p>
                        </div>
                        <div class="profile_likes">
                            <p>いいね合計数</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{--        TODO ループ--}}
        <div class="row">
            @foreach($photos as $photo)
                <div class="col-4">
                    <img src="data:image/png;base64,<?= $photo->photo_url ?>" alt="投稿写真" width="100%" height="200px">
                </div>
            @endforeach
        </div>
    </div>
@endsection
