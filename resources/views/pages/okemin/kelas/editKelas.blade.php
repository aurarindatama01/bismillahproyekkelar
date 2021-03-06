@extends('layouts.dash')

@section('title', 'Edit Kelas')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Kelas</li>
                    <li class="breadcrumb-item active">Edit Kelas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header" style="background-color:darkblue;">
                    <h3 class="card-title">Edit Kelas</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar->Kelas->List Kelas"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                <form role="form" action="/Okemin/Kelas/Update/{{ $kelas->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="input1" class="col-sm-6 col-form-label">Nama Kelas</label>
                        <div class="col-sm-12">
                          <input value="{{ $kelas->nama_kelas }}" name="nama_kelas" type="name" class="form-control" id="input1" placeholder="Nama Kelas">
                            @if($errors->has('nama_mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_mapel')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-6 col-form-label">Deskripsi Kelas</label>
                        <div class="col-sm-12">
                          <input value="{{ $kelas->deskripsi }}" name="deskripsi" type="text" class="form-control" id="input2" placeholder="Deskripsi Kelas">
                            @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-block bg-gradient" style="background-color: darkblue; color:white;">Upload</button>
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
