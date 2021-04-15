@extends('layouts.portal')

@section('title', 'Exam')

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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <h3 class="text-center">{{ $title }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <h3 class="text-center">{{ date("d F,Y", strtotime($exam_date)) }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ url('portal/exam_form_submit') }}" method="POST" class="database_operation">
                                        @csrf
                                        <input type="hidden" name="exam" value="{{ $id }}">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Enter Name:</label>
                                                <input type="text" required name="name" placeholder="Enter Name:"
                                                    class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Enter Email:</label>
                                                <input type="email" required name="email" placeholder="Enter Email:"
                                                    class="form-control" id="">
                                            </div>
                                        </div>
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
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="email">Enter Password:</label>
                                                <input type="password" required name="password" placeholder=""
                                                    class="form-control" id="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
<script>
$(document).on("submit", ".database_operation",function () {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url,data,function(fb){
      var resp = JSON.parse(fb);
      if (resp.status == 'true') {
          alert(resp.message);
          setTimeout(() => {
              window.location.href=resp.reload;
          }, 200);
      }
      else{
        alert(resp.message); 
      }
      console.log(resp);
    });
    return false;
});
</script>