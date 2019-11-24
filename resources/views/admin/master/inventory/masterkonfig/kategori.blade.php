@extends('master.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Daftar Kategori</li>
@endsection

@section('judul')
  Kategori
@endsection


@section('content111')
     <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Input Kategori</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
         
          <!-- /.card-header -->
          <form method="post" action="{{url('admin/kategori/save')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Nama Kategori" name="kategori">
                  </div>
                </div>

              <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                      <button type="submit" class="btn btn-block btn-success" style="width: 100px">ADD</button>
                  </div>
                </div>
              <!-- /.col -->
              </div>
            </div>
         
          
          <!-- /.card-body -->
            <div class="card-footer">
              
            </div>
          </div>
         </form>
      </div>
      <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">DataTable Kategori</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  ?>
                  @foreach($masterkat as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$row->kategori}}</td>
                    <td><a data-toggle="modal" href="#modalanjing{{$row->id}}" class="button button-primary edit"><i class="fa fa-edit"></i></a></td>
                    <td><a href="{{url('admin/kategori/delete/'.$row->id)}}" onclick="return confirm('Are you sure want delete?');"><i class="fa fa-trash"></i></a></td>
                  </tr>

                  <div class="modal fade show" id="modalanjing{{$row->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Daftar Kategori</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="background: white;">
                         <form action="{{url('admin/kategori/update')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="text" name="id" value="{{$row->id}}" hidden="">
                            <div class="form-group">
                              <input required="" type="text" class="form-control" placeholder="Nama Kategori"  name="kategori" value="{{$row->kategori}}" placeholder="Nama Instansi">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-outline-light">Save changes</button>
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