@extends('layouts.dash')

@section('title', 'Edit Jawaban')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Tugas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Tugas</li>
                    <li class="breadcrumb-item active">Edit Jawaban</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header" style="background-color: darkblue">
                    <h3 class="card-title">Edit Jawaban</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar->Jawaban->List Exercise"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                    <!-- Info Data Materi Lama sesuai id -->
                    <div class="callout callout-info">
                        <h6>Data lama untuk Materi ini :</h6>
                        <ul>
                            <li>Mata Pelajaran : {{ $exercise->mapel }}</li>
                            <li>Kelas : {{ $exercise->kelas }}</li>
                        </ul>
                    </div>

                <form role="form" action="/Student/Jawaban/Update/{{ $jawaban->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <select name="mapel" class="form-control">
                                @foreach($mapel as $m)
                                    <option value="{{ $m->nama_mapel }}">{{ $m->nama_mapel }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('mapel')}}
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10">
                          <input name="file" value="{{ $exercise->file}}" type="file" class="form-control" id="input2" placeholder="File">
                            @if($errors->has('file'))
                                <div class="text-danger">
                                    {{ $errors->first('file')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <input name="isi" value="{{ $jawaban->isi }}" type="text" class="form-control" id="input2" placeholder="Isi">
                            @if($errors->has('isi'))
                                <div class="text-danger">
                                    {{ $errors->first('isi')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button name="submit" type="submit" class="btn btn-block bg-gradient-" style="background-color: darkblue; color: white">Upload</button>
                </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->

@endsection
