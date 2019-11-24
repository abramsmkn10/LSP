@extends('superadmin.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Barang Masuk</li>
@endsection

@section('judul')
  Barang Masuk
@endsection


@section('content111')
     <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Input Barang Masuk</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
         
          <!-- /.card-header -->
          <form method="post" action="{{url('superadmin/masuk/save')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Silahkan Masukkan Barcode" name="barcode">
                  </div>
                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Silahkan Nama Barang" name="nama">
                  </div>
                  <div class="form-group">
                    <input required="" class="form-control " type="number" placeholder="Ssilahkan Jumlah Barang" name="jumlah">
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input required="" type="text" class="form-control " data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999-9999&quot;" data-mask="" im-insert="true" name="telpon">
                    </div>
                  </div>

                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Silahkan Masukkan Kode POS" name="kode_pos">
                  </div>
                  
                </div>
              <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Silahkan Masukkan VIA produk" name="type_masuk">
                  </div>
                  <div class="form-group">
                    <textarea  required="" class="form-control " rows="3" placeholder="silahkan masukkan deskripsi barang" name="deskripsi" style="height: 102px;"></textarea>
                  </div>
                   <div class="form-group">
                      <button type="submit" class="btn btn-block btn-success" style="width: 100px">ADD</button>
                  </div>
                </div>
              <!-- /.col -->
              </div>
            </div>
          </form>
          
          <!-- /.card-body -->
            <div class="card-footer">
              
            </div>
          </div>
        
      </div>
      <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">DataTable Barang Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Barcode</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Telpon</th>
                  <th>Kode POS</th>
                  <th>Deskripsi</th>
                  <th>VIA</th>
                  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  ?>
                  @foreach($produkin as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$row->barcode}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->jumlah}}</td>
                    <td>{{$row->telpon}}</td>
                    <td>{{$row->kode_Pos}}</td>
                    <td>{{$row->deskripsi}}</td>
                    <td>{{$row->type_masuk}}</td>
                    <td><a data-toggle="modal" href="#modalanjing{{$row->id}}" class="button button-primary edit"><i class="fa fa-edit"></i></a></td>
                    <td><a href="{{url('superadmin/masuk/delete/'.$row->id)}}" onclick="return confirm('Are you sure want delete?');"><i class="fa fa-trash"></i></a></td>
                  </tr>

                  <div class="modal fade show" id="modalanjing{{$row->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Informasi Toko</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="background: white;">
                        <form method="post" action="{{url('superadmin/masuk/update')}}" enctype="multipart/form-data">
				            @csrf
				             <input type="text" name="id" value="{{$row->id}}" hidden="">
				              	 <div class="form-group">
				                    <input required="" class="form-control " value="{{$row->barcode}}" type="text" placeholder="Silahkan Masukkan Barcode" name="barcode">
				                  </div>
				                  <div class="form-group">
				                    <input required="" class="form-control " value="{{$row->nama}}" type="text" placeholder="Silahkan Nama Barang" name="nama">
				                  </div>
				                  <div class="form-group">
				                    <input required="" class="form-control " value="{{$row->jumlah}}" type="number" placeholder="Ssilahkan Jumlah Barang" name="jumlah">
				                  </div>

				                  <div class="form-group">
				                    <div class="input-group">
				                      <div class="input-group-prepend">
				                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
				                      </div>
				                      <input required="" type="text" value="{{$row->telpon}}" class="form-control " data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999-9999&quot;" data-mask="" im-insert="true" name="telpon">
				                    </div>
				                  </div>

				                  <div class="form-group">
				                    <input required="" class="form-control " value="{{$row->kode_Pos}}" type="text" placeholder="Silahkan Masukkan Kode POS" name="kode_pos">
				                  </div>
				                  <div class="form-group">
				                    <input required="" class="form-control " value="{{$row->type_masuk}}" type="text" placeholder="Silahkan Masukkan VIA produk" name="type_masuk">
				                  </div>
				                  <div class="form-group">
				                    <textarea  required="" class="form-control " rows="3" placeholder="silahkan masukkan deskripsi barang" name="deskripsi" style="height: 102px;">{{$row->deskripsi}}</textarea>
				                  </div>
				                   <div class="form-group">
				                      <button type="submit" class="btn btn-block btn-success" style="width: 100px">UPDATE</button>
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