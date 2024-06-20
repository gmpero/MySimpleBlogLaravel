@extends('layouts.main')
@section('header')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{asset('storage/'.$post->image)}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <h2 class="subheading">{{$post->short_content}}</h2>
                        <span class="meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                               {{$data->translatedFormat('Y-m-d')}}
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <!--Вывод поста-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{{$post->content}}</p>
                    <p>
                        Placeholder text by
                    </p>
                </div>
            </div>
        </div>
    </article>
    <!--Блок для комментариев-->
    <article class="text-bg-light">
        <hr>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!--Вывод комментариев-->
                    <div class="my-5">
                        <div class="comment-list">
                            @foreach($post->comments as $comment)
                                <div class="comment-text mb-3">
                                    <div class="w-50">
                                        <span class="username text-info">{{$comment->user->name}}</span>
                                        <span class="text-muted float-right">8:03 PM Today</span>
                                    </div>
                                    <!-- /.username -->
                                    {{$comment->message}}
                                    <div>
                                        @guest()
                                            <div>
                                                <span>{{$comment->liked_users_count}}</span>
                                                <i class="far fa-heart"></i>
                                            </div>
                                        @endguest
                                        @auth()
                                            <form action="{{route('post.comment.like', $post->id)}}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="comment_id" value={{$comment->id}}>
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <span>{{$comment->liked_users_count}}</span>
                                                    @if(auth()->user()->likedComments->contains($comment->id))
                                                        <i class="fa-regular fa-heart text-danger"></i>
                                                    @else
                                                        <i class="fa-regular fa-heart"></i>
                                                    @endif
                                                </button>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--Форма отправки комментариев-->
                    @auth()
                        <div class="my-5">
                            <form method="POST" action="{{route('post.comment.store', $post->id)}}">
                                @csrf
                                @method('POST')
                                <div class="form-floating">
                                <textarea name="message" class="form-control" id="message"
                                          placeholder="Enter your message here..." style="height: 12rem"
                                          data-sb-validations="required"></textarea>
                                    <label for="message">Message</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is
                                        required.
                                    </div>
                                </div>
                                <br/>
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Отправить
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </article>
@endsection


