@extends('layouts.dash')

@section('title', 'Lihat Tugas' )

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $singleExercise->nama_exercise }}</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Materi</li>
                    <li class="breadcrumb-item">Pilih Mapel</li>
                    <li class="breadcrumb-item">Pilih Tugas</li>
                    <li class="breadcrumb-item">Lihat Tugas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: darkblue;">
                        <h3 class="card-title">{{ $singleExercise->nama_exercise}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! $singleExercise->deskripsi !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <button name="submit" class="btn btn-block bg-gradient" style="background-color: darkblue; color: white;"><a href="student/jawaban/createJawaban/{{$singleExercise->id}}">Jawab</a></button>
                <!-- /.card -->
            </div>

            <div class="col-md-4">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Description</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h4><strong>Info :</strong></h4>
                            <p><strong>Mata Pelajaran :</strong>  {{ $singleExercise->mapel }}</p>
                            <p><strong>Untuk Kelas :</strong>  {{ $singleExercise->kelas }}</p>
                            <p><strong>File :</strong><a href="{{url('/Student/Exercise/downloadtugas', $singleExercise->file)}}">  {{ $singleExercise->file }}</a></p>
                            <br>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            
                

        </div>

    </section>
    <!-- /.content -->
@endsection
