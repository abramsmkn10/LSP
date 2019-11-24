@extends('superadmin.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Master Pengguna</li>
@endsection

@section('judul')
  Master Pengguna
@endsection


@section('content111')        
     <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Input Pengguna</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>

          <!-- /.card-header -->
           <form action="{{route('pengguna_proses_tambah')}}" method="POST">
            @csrf
           	<div class="card-body">
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" placeholder="Nama" name="name" class="form-control"  required>
                </div>
                <div class="form-group">
                  <select name="role" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Hak Akses</option>
                    <option value="2">Super Admin</option>
                    <option value="1">Admin</option>
                    <option value="0">Kasir</option>
                  </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <input type="email" placeholder="E-Mail" name="email" class="form-control" required>
               </div>
               <div class="form-group">
                   <input type="password" placeholder="Password" name="password" class="form-control"required>
               </div>
           </div>
          <!-- /.card-body -->
          	<div class="card-footer">
          		<button type="submit" class="btn btn-block btn-success" style="width: 100px">ADD</button>
          	</div>
          </div>
          </div>
          </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">DataTable Input Pengguna</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  	<th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                  </tr>
                </thead>
               <tbody>
                  <?php
                  $i = 1;
                  ?>
                @foreach($pengguna as $penggunas)
                <tr>
                  <td>{{$i++}}</td>
                  <td><a href="{{route('pengguna_detail', $penggunas->id)}}">{{$penggunas->name}}</a></td>
                  <td>{{$penggunas->email}}</td>
                  @if($penggunas->role == '0')
                  <td>Kasir</td>
                  @elseif($penggunas->role == '1')
                  <td>Admin</td>
                  @else
                  <td>Super Admin</td>
                  @endif
                  <td>
                      <a data-toggle="modal" href="#modalanjing{{$penggunas->id}}" class="button button-primary edit"><i class="fa fa-edit"></i></a>
                   </td>
                  <td><a href="{{route('pengguna_hapus', $penggunas->id)}}" onclick="return confirm('Are you sure want delete?');"><i class="fa fa-trash"></i></a></td>
                </tr>
                <div class="modal fade show" id="modalanjing{{$penggunas->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Daftar User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="background: white;">
                         <form action="{{route('pengguna_proses_detail')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{$penggunas->id}}">
                                    <input type="text" name="name" class="form-control" placeholder="Silahkan Isi Username" required value="{{$penggunas->name}}">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Silahkan isi E-Mail" required value="{{$penggunas->email}}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="************">
                                </div>
                                <div class="form-group">
                                    <select name="role" class="form-control " required>
                                        @if($penggunas->role != null && $penggunas->role == '2')
                                        <option value="{{$penggunas->role}}">Super Admin</option>
                                        @elseif($penggunas->role != null && $penggunas->role == '1')
                                        <option value="{{$penggunas->role}}">Admin</option>
                                        @elseif($penggunas->role != null && $penggunas->role == '0')
                                        <option value="{{$penggunas->role}}">Kasir</option>
                                        @else
                                        <option value="">Pilih Hak Akses</option>
                                        @endif
                                        <option value="2">Super Admin</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Kasir</option>
                                    </select>
                                </div>
                        <div class="modal-footer justify-content-between">
                        <div class="form-group">
                        	<button type="submit" class="btn btn-block btn-info btn-lg">Save changes</button>
                        </div>
                          
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    

@endsection