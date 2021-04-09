@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Students</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage Students</li>
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
                                        data-target="#myModal">Add New Student</a>
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile No</th>
                                                        <th>DOB</th>
                                                        <th>Exam</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($students as $keys =>$student)
                                                    <tr>
                                                        <td>{{ $keys+1 }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->email }}</td>
                                                        <td>{{ $student->mobile_no }}</td>
                                                        <td>{{ $student->dob }}</td>
                                                        <td>{{ $student->title }}</td>
                                                        <td><input class="student_status" data-id="{{ $student->id}}"
                                                            @php
                                                                if($student->status ==1){echo "checked";}
                                                            @endphp
                                                            type="checkbox" name="status" id=""></td>

                                                        <td>
                                                            <a href="{{ url('admin/edit_student/'.$student->id) }}" class="btn btn-info">Edit</a>
                                                            <a href="{{ url('admin/delete_student/'.$student->id) }}"  class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                 
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile No</th>
                                                        <th>DOB</th>
                                                        <th>Exam</th>
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
                    <h4 class="modal-title">Add New Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('admin/add_new_student') }}" class="database_operation">
                        @csrf
                        <div class="form-group">
                            <label for="email">Enter Name:</label>
                            <input type="text" required name="name" placeholder="Enter Name:" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Email:</label>
                            <input type="email" required name="email" placeholder="Enter Email:" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Mobile No:</label>
                            <input type="text" required name="mobile_no" placeholder="Enter Mobile:" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="exam">Select DOB:</label>
                            <input type="date" required name="dob" placeholder="Enter DOB:" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Select Exam:</label>
                                <select name="exam" required  id="category" class="form-control">
                                    <option value=""> -- Select One --</option>
                                    @foreach ($exams as $cat)
                                        <option value="{{ $cat['id'] }}">{{ $cat['title'] }}</option>
                                    @endforeach 
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Password:</label>
                            <input type="password" required name="password" placeholder="" class="form-control"
                                id="">
                        </div>
                       

                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection
