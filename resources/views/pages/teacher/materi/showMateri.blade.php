@extends('layouts.dash')

@section('title', 'List Materi')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Materi</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Materi</li>
                    <li class="breadcrumb-item active">List Materi</li>
                </ol>
                </div>
                <a class="btn btn-primary float-right mt-2" href="{{ url('/Teacher/Materi/Create')}}" role="button" style="background-color: darkblue;">Tambah Materi</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Daftar Materi</h3>
                    <div class="card-tools">
                        <form action="/Teacher/Materi/List/Search/" method="get">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button name="submit" type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                        <!-- /.card-header -->

                <div class="card-body table-responsive p-0" style="height: auto;">
                  <table class="table table-head-fixed">
                    <thead>
                      <tr>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>Judul Materi</th>
                        <th>File</th>
                        <th>Download</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($materis as $materi )
                        <tr>
                            <td>{{ $materi->mapel }}</td>
                            <td>{{ $materi->kelas }}</td>
                            <td>{{ $materi->judul }}</td>
                            <td><a href="{{url('/Teacher/Materi/downloadmateri', $materi->file)}}">{{ $materi->file }}</a></td>
                            <td>
                                <a type="button" class="btn btn-block bg-gradient btn-xs" href="/Teacher/Materi/Edit/{{ $materi->id }}" style="background-color: darkblue; color: white">Edit</a>
                                <a type="button" class="btn btn-block bg-gradient-danger btn-xs" href="/Teacher/Materi/Delete/{{ $materi->id }}">Delete</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
