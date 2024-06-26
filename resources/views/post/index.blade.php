@extends('layouts.main')


@section('header')
    <header class="masthead" style="background-image: url({{asset('assets/img/home-bg.jpg')}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap...</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection


@section('content')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('post.post', $post->id)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{$post->short_content}}</h3>
                        </a>
                        <p class="post-meta">
                            Опубликовано
                            {{$post['created_at']->translatedFormat('d M Y')}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4"/>
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
