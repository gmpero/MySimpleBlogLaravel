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
                                on August 24, 2023
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
@endsection


