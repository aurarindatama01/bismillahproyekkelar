@extends('layouts.dash')

@section('title', 'Pilih Tugas')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tugas -> Pilih Tugas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Tugas</li>
                    <li class="breadcrumb-item">Pilih Mapel</li>
                    <li class="breadcrumb-item">Pilih Tugas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        @foreach ($exercises->chunk(4) as $exercise)
        
        <div class="row">
            
          <!-- Show List of Mapels -->
          @foreach($exercise as $e)
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h5>{{ $e->nama_exercise }}</h5>
                    <br>
                    <p style="line-height:0px;">{{ $e->mapel }}</p>
                    <p>{{ $e->kelas }}</P>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="/Student/Tugas/singleTugas/{{ $e->id }}" class="small-box-footer">Lihat Tugas Ini <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
          @endforeach
         

        </div>
        
        @endforeach
        <!-- /.row -->
        
    </section>
    <!-- /.content -->
@endsection
