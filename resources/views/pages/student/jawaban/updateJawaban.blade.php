@extends('layouts.dash')

@section('title', 'Jawaban Tugas')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jawab Tugas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Tugas</li>
                    <li class="breadcrumb-item active">Jawaban Tugas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: darkblue;">
                    <h3 class="card-title">Jawaban Tugas</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar->Tugas"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                    <form role="form" action="/Student/Tugas/Update/{{$jawaban->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- <input type="hidden" name="id" value="{{ $exercise->id }}"> -->
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-10">
                          <input name="id_mapel" type="text" class="form-control" id="input2" value="{{ $exercise->mapel }}" readonly="disabled">
                            @if($errors->has('id_mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('id_mapel')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Nama Tugas</label>
                        <div class="col-sm-10">
                          <input name="id_exercise" type="text" class="form-control" id="input2" value="{{ $exercise->nama_exercise }}" readonly="disabled">
                            @if($errors->has('id_exercise'))
                                <div class="text-danger">
                                    {{ $errors->first('id_exercise')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Isi Tugas</label>
                        <div class="col-sm-10">
                            <textarea id="ckeditor" name="isi" class="textarea" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                              @if($errors->has('isi'))
                                <div class="text-danger">
                                    {{ $errors->first('isi')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10">
                          <input name="file" type="file" class="form-control" id="input2" placeholder="File">
                            @if($errors->has('file'))
                                <div class="text-danger">
                                    {{ $errors->first('file')}}
                                </div>
                            @endif
                            <br>
                            <button name="submit" type="submit" class="btn btn" style="background-color: darkblue; color: white">Upload</button>
                        </div>
                    </div>
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
    <script>
        var CSRFToken = $('meta[name="csrf-token"]').attr('content');
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+CSRFToken,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+CSRFToken
        };
    </script>
    <script>
        CKEDITOR.replace('ckeditor', options);
    </script>

@endsection
