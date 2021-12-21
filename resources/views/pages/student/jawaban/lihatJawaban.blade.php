@extends('layouts.dash')

@section('title', 'Lihat Tugas' )

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Materi</li>
                    <li class="breadcrumb-item">Pilih Mapel</li>
                    <li class="breadcrumb-item">Pilih Tugas</li>
                    <li class="breadcrumb-item">Lihat Jawaban Tugas</li>
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
                    </div>
                    <!-- /.card-header -->
                    @foreach($singleJawaban as $singleJawaban)
                    <div class="card-body">
                        <p>Isi : {{$singleJawaban -> isi}}</p>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>

            <!-- <div class="col-md-4">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Description</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div> -->
                            
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <!-- <div class="card-body">
                            <h4><strong>Info :</strong></h4>
                        </div> -->
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            
                

        </div>

    </section>
    <!-- /.content -->
@endsection
