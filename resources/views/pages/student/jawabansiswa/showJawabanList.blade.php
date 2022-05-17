@extends('layouts.dash')

@section('title', 'List Exercise')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Tugas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Jawaban</li>
                    <li class="breadcrumb-item active">List Jawaban</li>
                </ol>
                </div>
                <!-- <a class="btn btn-primary float-right mt-2" href="{{ url('/Teacher/Exercise/Create')}}" role="button" style="background-color: darkblue;">Tambah Tugas</a> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Daftar Jawaban Tugas</h3>
                    <div class="card-tools">
                        <form action="/Student/Jawaban/List/Search/" method="get">
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
                        
                        <th>Isi</th>
                        <th>File</th>
                        <th>Edit Jawaban</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach( $jawaban as $jawaban )
                            
                      
                        
                            <td>{{ $jawaban->isi }}</td>
                            <td><a href="{{url('/Student/Jawaban/downloadJawaban', $jawaban->file)}}">download file</a></td>
                          
                            <td>
                                <a type="button" class="btn btn-block bg btn-xs" href="/Student/Jawaban/Edit/{{ $jawaban->id }}" style="background-color: darkblue; color:white">Edit</a>
                                <a type="button" class="btn btn-block bg-danger btn-xs" href="/Student/Jawaban/Delete/{{ $jawaban->id }}">Delete</a>
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
