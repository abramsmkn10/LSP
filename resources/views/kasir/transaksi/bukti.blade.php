<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<script src="/bootstrap/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kode_unik as $kode_uniks)
    @foreach($kode_uniks->relasicart as $produks)
    <tr>
      <td>{{$produks->nama}}</td>
      <td>{{$kode_uniks->jumlah}}</td>
      <td>{{$kode_uniks->sub_total}}</td>
    </tr>
    @endforeach
    @endforeach
  </tbody>
</table>