@extends('layouts.dash')

@section('title', 'Create Admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Admin</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Create Admin</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header" style="background-color: darkblue;">
                    <h3 class="card-title">Create Admin</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                    <p>Lihat di Sidebar->User Manager->Admin Manager</p>
                                </div>
                            @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                <form role="form" action="/Okemin/User/Admin/Create/Send" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5>DATA PRIBADI</h5>
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Nama*</label>
                        <div class="col-sm-10">
                          <input name="name" type="name" class="form-control" id="input1" placeholder="Nama Admin">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="input10" class="col-sm-2 col-form-label">Username*</label>
                        <div class="col-sm-10">
                          <input name="username" type="text" class="form-control" id="input2" placeholder="Username">
                            @if($errors->has('username'))
                                <div class="text-danger">
                                    {{ $errors->first('username')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input11" class="col-sm-2 col-form-label">E-mail*</label>
                        <div class="col-sm-10">
                          <input name="email" type="email" class="form-control" id="input3" placeholder="E-mail">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label for="input12" class="col-sm-2 col-form-label">No.Telp</label>
                        <div class="col-sm-10">
                          <input name="no_telp" type="text" class="form-control" id="input4" placeholder="Nomor Telepon/HP">
                            @if($errors->has('no_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_telp')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input13" class="col-sm-2 col-form-label">Password*</label>
                        <div class="col-sm-10">
                          <input name="password" type="password" class="form-control" id="input5" placeholder="Password">
                            @if($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-block bg-gradient" style="background-color: darkblue; color: white;">Upload</button>
                </form>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <div class="d-none" id="card-refresh-content">
                The body of the card after card refresh
            </div>
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
@endsection
