@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Теги</h1>
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
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <a href="{{route('admin.tag.create')}}" class="btn btn-primary">Добавить</a>
                    </div>
                    <div class="card-body table-responsive p-0 mt-3">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th colspan="3" class="text-center">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->title}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.tag.show', $tag->id)}}" class="text-blue">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.tag.edit', $tag->id)}}" class="text-green">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('admin.tag.delete', $tag->id)}}" method="POST">
                                        @CSRF
                                        @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
