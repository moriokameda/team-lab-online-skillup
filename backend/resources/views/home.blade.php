@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($photos as $photo)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <?php
                        //                        var_dump($photo);
                        //                        exit();
                        $user = $users->firstWhere('id', $photo->user_id);
                        $like = $likes->firstWhere('photo_id', $photo->id);
                        $photo_id = (string)$photo->id;
                        //                        var_dump($like);
                        //                        exit();
                        ?>
                        {{--                TODO foreachループでユーザ名のカードを追加--}}
                        <div class="card-header">
                            ユーザ名:
                            <span class="user-name">{{ $user->name }}</span>
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
                                <img src="data:image/png;base64,<?= $photo->photo_url ?>" alt="ここには投稿画像パスが表示"
                                     width="300px" height="200px">
                            </div>
                            <div class="caption-wrap">
                                <div class="caption">
                                    {{ $photo->caption }}
                                </div>
                                <a class="like">
                                    @isset($like)
                                        <a href="{{route('likes',['photo_id' => $photo_id ])}}">
                                            いいねしたユーザ数
                                            {{ $like->count() }}
                                        </a>
                                    @endisset
                                </a>
                                @guest
                                    <a class="btn like-btn no-active">
                                        <img name="like" src="" alt="非活性の星ボタン">
                                    </a>
                                @else
                                    <form action="/instagram/post/like" method="POST">
                                        @csrf
                                        <input name="photo_id" type="hidden" value="{{$photo->id}}">
                                        <input name="like" type="submit" value="いいね">
                                    </form>
                                @endguest
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="prev-next-area">
            <div class="prev-area">
                <button class="prev btn">前へ</button>
            </div>
            <div class="next-area">
                <button class="next btn">次へ</button>
            </div>
        </div>
    </div>
@endsection
