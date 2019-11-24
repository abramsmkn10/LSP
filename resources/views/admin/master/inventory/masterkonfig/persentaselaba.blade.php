@extends('master.mainx')

@section('beritahu')
  <li class="breadcrumb-item active">Daftar Unit</li>
@endsection

@section('judul')
  Unit
@endsection


@section('content111')
     <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Input Unit</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
         
          <!-- /.card-header -->
          <form action="{{route('laba_proses_tambah')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input required="" class="form-control " type="text" placeholder="Masukkan Persentase Laba (%)" name="laba">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <button type="submit" class="btn btn-block btn-success" style="width: 100px">ADD</button>
                  </div>
                </div>
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
              <h3 class="card-title">DataTable Unit</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Laba</th>
                      <th>Action</th>
                  </tr>
              </thead>
               <tbody>
              	  @foreach($laba as $labas)
                  <tr>
                      <td>{{$labas->id}}</td>
                      <td>{{$labas->laba}}</td>
                       <td><a href="{{route('laba_hapus', $labas->id)}}" onclick="return confirm('Are you sure want delete?');"><i class="fa fa-trash"></i></a></td>
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

@endsection