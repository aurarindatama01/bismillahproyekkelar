@extends('layouts.dash')

@section('title', 'List User Admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Dari User Admin</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">List User Admin</li>
                </ol>
                </div>
                <a class="btn btn-primary float-right mt-2" href="{{ url('/Superadmin/Sekolah/Create')}}" role="button" style="background-color: darkblue;">Tambah Sekolah</a>
            </div>
            
        </div><!-- /.container-fluid -->
        
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Daftar User Admin</h3>
                    <div class="card-tools">
                        <form action="/Superadmin/Sekolah/List/Search/" method="get">
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
                        <th>Nama Sekolah</th>
                        <th>Nomor Telepon</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($admin as $a )
                        <tr>
                            <td>{{ $a->nama_sekolah }}</td>
                            <td>{{ $a->no_telp }}</td>
                            <td>{{ $a->username }}</td>
                            <td>{{ $a->email }}</td>
                            <td>
                                <a type="button" class="btn btn-block bg-gradient btn-xs" href="/Okemin/User/Admin/Profile/{{ $a->id }}" style="background-color: darkblue; color:white;">Edit Sekolah</a>
                                <a type="button" class="btn btn-block bg-gradient-danger btn-xs" href="/Okemin/User/Admin/Delete/{{ $a->id }}">Delete</a>
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
