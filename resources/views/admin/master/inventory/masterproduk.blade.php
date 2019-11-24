@extends('master.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Master Produk</li>
@endsection

@section('judul')
  Master Produk
@endsection


@section('content111')        
     <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Input Produk</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>

          <!-- /.card-header -->
           <form method="post" action="{{route('produk_proses_tambah')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control " type="text" placeholder="Masukkan Nama Produk" required="" name="nama">
                  </div>
                  <div class="form-group">
                      <select name="kategori_id" class="form-control select2" required>
                           <option value="0">Pilih Kategori Produk</option>
                          @foreach($kategori as $kategoris)
                          <option value="{{$kategoris->id}}">{{$kategoris->kategori}}</option>
                           @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <input class="form-control " type="text" placeholder="Masukkan stok Produk" required="" name="stok">
                  </div>
                   <div class="form-group">
                    <select name="mata_uang_id" class="form-control select2" style="width: 100%;" required>
                        <option value="0">Pilih Mata Uang</option>
                        @foreach($matauang as $matauangs)
                         <option value="{{$matauangs->id}}">{{$matauangs->matauang}}</option>
                         @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                      <select name="unit_id" class="form-control select2" style="width: 100%;" required="" placeholder="Masukkan Unit Produk" required>
                          <option value="0">Pilih Unit Produk</option>
                          @foreach($unit as $units)
                         <option value="{{$units->id}}">{{$units->unit}}</option>
                           @endforeach
                       </select>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" required="" placeholder="Masukkan Harga Beli" required="" name="harga_beli">
                  </div>
                   
                </div>
              <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="text-label">Harga Jual Produk*</label>
                      <select name="laba" class="form-control select2" style="width: 100%;" required>
                           <option value="0">Pilih Persentase Laba</option>
                           @foreach($laba as $labas)
                                        <option value="{{$labas->laba}}">{{$labas->laba}}%</option>
                           @endforeach
                      </select>
                      <select name="ppn" class="form-control select2" style="width: 100%;" required>
                           <option value="0">Pilih Stok Minimum</option>
                            @foreach($stok_minimum as $stok_minimums)
                          <option value="{{$stok_minimums->ppn}}">Stok Minimum: {{$stok_minimums->stok_minimum}} - PPN: {{$stok_minimums->ppn}}%</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <input class="form-control " required="" type="number" placeholder="Masukkan Diskon Produk" name="diskon">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control " rows="3" placeholder="Masukkan Keterangan Produk" name="keterangan" style="height: 69px;" required=""></textarea>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">DataTable Input Produk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Action</th>
                  </tr>
                </thead>
               <tbody>
                  <?php
                  $i = 1;
                  ?>
                @foreach($produk as $row)
                <tr>
                  <td>{{$i++}}</td>
                  <td><a data-toggle="modal" href="#modalkucing{{$row->id}}" title="Detail">{{$row->barcode}}</a></td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->relasikategori->kategori}}</td>
                  <td><a href="{{route('produk_hapus', $row->id)}}" onclick="return confirm('Are you sure want delete?');"><i class="fa fa-trash"></i></a></td>
                </tr>
                <div class="modal fade show" id="modalkucing{{$row->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Daftar Produk</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="background: white;">

                         <form action="{{route('produk_proses_detail')}}" method="POST">
                              @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="barcode" value="{{$row->barcode}}">
                                    <input type="text" name="nama" class="form-control " placeholder="Masukkan Nama Produk" required value="{{$row->nama}}">
                                </div>
                                <div class="form-group">
                                    <select name="kategori_id" class="form-control select2" required>
                                        <option value="{{$row->relasikategori->id}}">{{$row->relasikategori->kategori}}</option>
                                        @foreach($kategori as $kategoris)
                                        <option value="{{$kategoris->id}}">{{$kategoris->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="stok" class="form-control " placeholder="Masukkan Stok Produk" required value="{{$row->stok}}">
                                </div>
                                <div class="form-group">
                                    <select name="mata_uang_id" class="form-control select2" required>
                                        <option value="{{$row->relasimatauang->id}}">{{$row->relasimatauang->matauang}}</option>
                                        @foreach($matauang as $matauangs)
                                        <option value="{{$matauangs->id}}">{{$matauangs->matauang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="unit_id" class="form-control select2" placeholder="Masukkan Unit Produk" required>
                                        <option value="{{$row->relasiunit->id}}">{{$row->relasiunit->unit}}</option>
                                        @foreach($unit as $units)
                                        <option value="{{$units->id}}">{{$units->unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               </div> 
                              <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="harga_beli" class="form-control" placeholder="Masukkan Harga Beli" required value="{{$row->harga_beli}}">
                                </div>
                                 
                                <div class="form-group">
                                    <label class="text-label" style="color: black;">Harga Jual Produk*</label>
                                    <select name="laba" class="form-control select2" required>
                                        <option value="{{$row->relasiunit->id}}">{{$row->relasilaba->laba}}%</option>
                                        @foreach($laba as $labas)
                                        <option value="{{$labas->id}}">{{$labas->laba}}%</option>
                                        @endforeach
                                    </select>
                                    <select name="stok_minimum" class="form-control select2" required>
                                        <option value="{{$row->relasilaba->id}}">{{$row->relasilaba->laba}}%</option>
                                        @foreach($stok_minimum as $stok_minimums)
                                        <option value="{{$stok_minimums->id}}">Stok Minimum: {{$stok_minimums->stok_minimum}} - PPN: {{$stok_minimums->ppn}}%</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="diskon" class="form-control" placeholder="Masukkan Diskon Produk" value="{{$row->diskon}}">
                                </div>
                                <div class="form-group">
                                    <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan Produk" required>{{$row->keterangan}}</textarea>
                                </div>
                              </div>
                            
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary btn-form mr-2">Submit</button>
        
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