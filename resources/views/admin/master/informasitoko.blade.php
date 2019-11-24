@extends('master.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Informasi Toko</li>
@endsection

@section('judul')
  Informasi Toko
@endsection


@section('content111')
     <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Input Informasi Toko</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
         
          <!-- /.card-header -->
          <form method="post" action="{{url('profil/save')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Nama Instansi" name="nama_koperasi">
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input required="" type="text" class="form-control " data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999-9999&quot;" data-mask="" im-insert="true" name="telepon">
                    </div>
                  </div>

                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Kode POS" name="kode_pos">
                  </div>
                  <div class="form-group">
                    <textarea required="" class="form-control " rows="3" placeholder="Deskripsi..." name="keterangan"></textarea>
                  </div>
                  <div class="form-group">
                    <textarea  required="" class="form-control " rows="3" placeholder="Alamat..." name="alamat_koperasi" style="height: 102px;"></textarea>
                  </div>
                </div>
              <!-- /.col -->
                <div class="col-md-6">
                  
                  <div class="card card-outline">

                    <div class="card-body box-profile">
                      <div class="form-group">
                        <div class="text-center">
                          <img src="../../dist/img/photo2.png" id="blah1" class="img-fluid img-circle" style="width: 200px;height: 200px;">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="custom-file">

                          <input required="" type="file" class="custom-file-input" id="customFile" name="foto" onchange="uploadFile(this);readURL1(this);">
                          <label id="file-name" class="custom-file-label" for="customFile" style="text-align: center;">Choose file</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success" style="width: 100px">ADD</button>
                      </div>
                    </div>
                    <!-- /.card-body -->
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
              <h3 class="card-title">DataTable Informasi Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Instansi</th>
                  <th>Telp</th>
                  <th>Kode POS</th>
                  <th>Deskripsi</th>
                  <th>Alamat</th>
                  <th>Foto</th>
                  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  ?>
                  @foreach($profil as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$row->nama_koperasi}}</td>
                    <td>{{$row->telepon}}</td>
                    <td>{{$row->kode_pos}}</td>
                    <td>{{$row->keterangan}}</td>
                    <td>{{$row->alamat_koperasi}}</td>
                    <td><img src="../images/{{$row->foto}}" class="img-thumbnail" style="widows: 100px; height: 100px;"></td>
                    <td><a data-toggle="modal" href="#modalanjing{{$row->id}}" class="button button-primary edit"><i class="fa fa-edit"></i></a></td>
                    <td><a href="{{url('profil/delete/'.$row->id)}}" onclick="return confirm('Are you sure want delete?');"><i class="fa fa-trash"></i></a></td>
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
                         <form action="{{url('profil/update')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="text" name="id" value="{{$row->id}}" hidden="">
                            <div class="form-group">
                              <input required="" type="text" class="form-control" placeholder="Nama Instansi"  name="nama_koperasi" value="{{$row->nama_koperasi}}" placeholder="Nama Instansi">
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                
                                <input required="" type="text" class="form-control " data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999-9999&quot;" data-mask="" im-insert="true" value="{{$row->telepon}}" name="telepon">
                              </div>
                            </div>
                            <div class="form-group">
                              <input required="" class="form-control" placeholder="Kode POS" value="{{$row->kode_pos}}" type="text" name="kode_pos">
                            </div>
                            <div class="form-group">
                              <textarea required="" class="form-control" placeholder="Keterangan" name="keterangan" type="text">{{$row->keterangan}}</textarea>
                            </div>
                            <div class="form-group">
                              <textarea required="" class="form-control" placeholder="Alamat" name="alamat_koperasi" type="text">{{$row->alamat_koperasi}}</textarea>
                            </div>
                          <div class="form-group">
                              <img src="{{url('images/'.$row->foto)}}" id="blah2" class="img-fluid">
                              <input required="" class="form-control" type="file" name="foto" onchange="readURL2(this);" value="{{$row->foto}}">
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



            <script type="text/javascript">
                function readURL1(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah1')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                    }
                }
                function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah2')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                    }
                }
                function uploadFile(target) {
                    document.getElementById("file-name").innerHTML = target.files[0].name;
                }
            </script>



@endsection