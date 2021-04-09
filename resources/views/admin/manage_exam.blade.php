@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Exam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage Exam</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Title</h3>

                                <div class="card-tools">
                                    <a href="javascript:;" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal">Add New Exam</a>
                                </div>
                            </div>
                           
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover"
                                                id="dataTables-example1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Exam date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($exam as $keys =>$exam)
                                                    <tr>
                                                        <td>{{ $keys+1 }}</td>
                                                        <td>{{ $exam->title }}</td>
                                                        <td>{{ $exam->name }}</td>
                                                        <td>{{ $exam->exam_date }}</td>
                                                        <td><input class="exam_status" data-id="{{ $exam->id}}"
                                                            @php
                                                                if($exam->status ==1){echo "checked";}
                                                            @endphp
                                                            type="checkbox" name="status" id=""></td>
                                                        
                                                        <td>
                                                            <a href="{{ url('admin/edit_exam/'.$exam->id) }}" class="btn btn-info">Edit</a>
                                                            <a href="{{ url('admin/delete_exam/'.$exam->id) }}"  class="btn btn-danger">Delete</a>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Exam date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
        </section>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Exam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('admin/add_new_exam') }}" class="database_operation">
                        @csrf
                        <div class="form-group">
                            <label for="email">Title:</label>
                            <input type="text" required name="title" placeholder="Enter Category name:" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Exam date:</label>
                            <input type="date" required name="exam_date" placeholder="" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Category:</label>
                            <select name="category" required  id="category" class="form-control">
                                <option value=""> -- Select One --</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                @endforeach 
                            </select>
                        </div>

                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection
