@extends('master.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Laporan Barang Keluar</li>
@endsection

@section('judul')
  Laporan Barang Keluar
@endsection


@section('content111')        
      <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Laporan Barang Keluar</h3>
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
                  <th>Tanggal</th>
                  <th>Via</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  ?>
                @foreach($produkout as $row)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$row->barcode}}</td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->jumlah}}</td>
                  <td>{{$row->created_at}}</td>
                  <td>{{$row->type_keluar}}</td>
                  <td>
                    <a data-toggle="modal" href="#modalkucing{{$row->id}}" class="btn btn-app"><i class="fas fa-copy"></i> Detail</a>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    @foreach($produkout as $row)
              <div class="modal fade" id="modalkucing{{$row->id}}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="height: 400px;">
                      
                      <div class="modal-body">
                        <div class="form-group" style="text-align: center;">
                          <h2 class="modal-title" >P[]SLTE</h2>
                        </div>
                        <br>
                        <input type="text" name="id" value="{{$row->id}}" hidden="">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>No.Telp   :</label>
                              <label>{{$row->telpon}}</label>
                            </div>
                            <div class="form-group">
                              <label>Kode POS  :</label>
                              <label>{{$row->kode_pos}}</label>
                            </div>
                            <div class="form-group">
                              <label>Deskripsi  :</label>
                              <label>{{$row->deskripsi}}</label>
                            </div>
                          </div>
                       </div>

                       <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Barcode</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Via</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>{{$row->barcode}}</td>
                          <td>{{$row->nama}}</td>
                          <td>{{$row->created_at}}</td>
                          <td>{{$row->type_keluar}}</td>
                        </tr>
                        
                        
                        
                        </tbody>
                      </table>

                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                @endforeach

    

@endsection