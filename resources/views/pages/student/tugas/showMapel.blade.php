@extends('layouts.dash')

@section('title', 'Pilih Mata Pelajaran - Materi')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pilih Mata Pelajaran</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Materi</li>
                    <li class="breadcrumb-item">Pilih Mapel</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
        <!-- Small boxes (Stat box) -->
        @foreach ($mapels->chunk(4) as $mapel)
        <div class="row" >

          <!-- Show List of Mapels -->
          @foreach($mapel as $m)
            <div class="col-lg-3 col-6" >
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h5>{{ $m->nama_mapel }}</h5>
                    <br>
                    <p style="line-height:0px;">{{ $user->kelas }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <a href="/Student/Tugas/List/{{ $m->id }}" class="small-box-footer">Lihat List Tugas <i class="fas fa-arrow-circle-right"></i></a>
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
