@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Exam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Exam</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ url('admin/edit_new_exam') }}" class="database_operation">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $exam->id }}">
                                        <label for="email">Enter Category name:</label>
                                        <input type="text" required name="title" value="{{ $exam->title }}"
                                            placeholder="Enter Category name:" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Exam date::</label>
                                        <input type="date" required name="exam_date" value="{{ $exam->exam_date }}"
                                            placeholder="Enter Category name:" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Category:</label>
                                        <select class="form-control" name="category" >
                                            <option value="">Please Select</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat['id'] }}"
                                                    {{ $cat['id'] == $exam->category ? 'selected' : '' }}>
                                                    {{ $cat['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
        </section>
    </div>



@endsection
