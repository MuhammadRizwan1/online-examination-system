@extends('layouts.portal')

@section('title', 'Exam')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Exam Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Exam Form</li>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                    <h3 class="text-center"></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <h3 class="text-center"></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ url('portal/student_exam_info') }}" method="get">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Enter Mobile No:</label>
                                                <input type="text" required name="mobile_no" placeholder="Enter Mobile:"
                                                    class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Select DOB:</label>
                                                <input type="date" required name="dob" placeholder="Enter DOB:"
                                                    class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Select Exam:</label>
                                                <select name="exam" required  id="category" class="form-control">
                                                    <option value=""> -- Select One --</option>
                                                    @foreach ($std_info as $cat)
                                                        <option value="{{ $cat['id'] }}">{{ $cat['title'] }}</option>
                                                    @endforeach 
                                                </select>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


@endsection
