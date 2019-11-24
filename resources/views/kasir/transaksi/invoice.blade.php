<!-- extends('kasir.mainx') -->
@section('content111')
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Checkout</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="">Checkout</a>
                            </li>
                        </ol>
                    </div>
                </div>

                @if($message = Session::get('sukses'))
                <div class="alert alert-primary alert-dismissible fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button> <strong>{{$message}}</strong></div>
                @endif

                    <div class="col-12">
                        <div class="card forms-card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Checkout</h4>
                                <div class="basic-form">
                                    <div class="invoice-box">
                                        <div class="form-group">
        <form action="{{route('transaksi_proses_checkout')}}" method="POST">
            @csrf
        <table cellpadding="0" cellspacing="0">
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
                <td>
                    <div class="row mb-4">
                        <div class="col-sm-6 col-md-4 col-xl">
                            <div class="form-radio">
                                <input id="radio22" checked class="radio-outlined"  name="metode" type="radio" value="cash">
                                <label for="radio22" class="radio-red">Cash</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl">
                            <div class="form-radio">
                                <input id="radio24" class="radio-outlined"  name="metode" type="radio" value="gopay">
                                <label for="radio24" class="radio-green">Gopay</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl">
                            <div class="form-radio">
                                <input id="radio25" class="radio-outlined"  name="metode" type="radio" value="dana">
                                <label for="radio25" class="radio-blue">Dana</label>
                            </div>
                        </div>
                    </div>
                </td>
                <!-- <td>
                    1000
                </td> -->
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            @foreach($cart as $carts)
            @foreach($carts->relasicart as $produk_cart)
            <tr class="item">
                <td>
                    {{$produk_cart->nama}} x{{$carts->jumlah}}
                </td>
                
                <td>
                    Rp. {{$carts->sub_total}}
                </td>
            </tr>
            @endforeach
            @endforeach

            <tr class="total">
                <td></td>
                
                @if($cart)
                <td>
                   Rp. {{$cart->sum('sub_total')}}
                </td>
                @else
                <td>
                   Rp. 
                </td>
                @endif
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
            <input type="number" class="form-control" name="saldo" placeholder="Masukkan Jumlah Uang">
                            <div class="card-body">
                                <div class="button-icon">
                                    <a href="{{route('transaksi_proses_checkout')}}" class="btn btn-primary">Process<span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span></a>
                                </div>
                            </div>
                </td>
            </tr>
        </table>
        </form>
    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection