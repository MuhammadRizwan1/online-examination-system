@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Portal</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage Portal</li>
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
                                        data-target="#myModal">Add New Portal</a>
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
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($portal as $keys =>$exam)
                                                    <tr>
                                                        <td>{{ $keys+1 }}</td>
                                                        <td>{{ $exam['name'] }}</td>
                                                        <td>{{ $exam['email'] }}</td>
                                                        <td>{{ $exam['mobile_no']  }}</td>
                                                        <td><input class="portal_status" data-id="{{ $exam['id']}}"
                                                            @php
                                                                if($exam['status'] ==1){echo "checked";}
                                                            @endphp
                                                            type="checkbox" name="status" id=""></td>
                                                        
                                                        <td>
                                                            <a href="{{ url('admin/edit_portal/'.$exam['id']) }}" class="btn btn-info">Edit</a>
                                                            <a href="{{ url('admin/delete_portal/'.$exam['id']) }}"  class="btn btn-danger">Delete</a>
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
                    <h4 class="modal-title">Add New Portal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('admin/add_new_portal') }}" class="database_operation">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" required name="name" placeholder="Enter  Name" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" required name="email" placeholder="Enter  Email" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile No:</label>
                            <input type="text" required name="mobile_no" placeholder="Enter  Mobile No" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Password:</label>
                            <input type="password" required name="password" placeholder="Enter  Password" class="form-control"
                                id="">
                        </div>
                     
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection
