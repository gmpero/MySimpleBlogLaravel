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
    <!-- Post Content-->
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
    <article class="text-bg-light">
        <hr>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
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
                                        <form action="">
                                            <button type="submit" class="border-0 bg-transparent"><i class="fa-regular fa-heart"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </article>
@endsection


