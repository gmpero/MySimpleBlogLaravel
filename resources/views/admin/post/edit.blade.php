@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста: <span class="text-green d-block">{{$post->title}}</span>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row mb-2 pl-2">
                <div class="col-6">
                    <form action="{{route('admin.post.update', $post->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Заголовок"
                                   value="{{$post->title}}">
                        </div>
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="3"
                                      placeholder="Основной текст">{{$post->content}}</textarea>
                        </div>
                        <div class="mb-3 w-50">
                            <img src="{{asset('storage/'.$post->image)}}" alt="photo" class="w-50">
                        </div>
                        <div class="mb-3">
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="category_id">
                                <option selected disabled>Откройте это меню выбора категории</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{$category->id == $post->category_id ? ' selected' : ''}}>
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="tag_ids[]" class="select2" multiple="multiple"
                                    data-placeholder="Выберите тэги"
                                    style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                    {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray())? 'selected' : ''}}>
                                        {{$tag->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary  w-100">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
