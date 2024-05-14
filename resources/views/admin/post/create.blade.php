@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание поста</h1>
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
                    <form action="{{route('admin.post.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Заголовок">
                        </div>
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="3" placeholder="Основной текст"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary  w-100">Создать</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
