@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="justify-content-center">
            @foreach($likes as $like)
                <?php
                $user = $users->firstWhere('id', $like->user_id);
                ?>
                <li class="row card">
                    <div class="card-body">
                        <div class="card-img">
                            {{--                        TODO ユーザのプロフィール画像ページへのリンクを貼り付け--}}
                            <a href="{{url('/instagram/profile/'.$user->id)}}">
                                <img src="{{ $user->avatar }}" alt="ユーザ">
                            </a>
                        </div>
                        <div>
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
