@extends('kasir.mainx')
@section('content111')
<div class="col-12">
                    <div class="card card-default">
                
                        <h4 class="card-title mb-4">Invoice</h4>
                                    <center>
                                    <div class="button-icon">
                                        <form action="{{route('invoice')}}" method="GET">
                                        @csrf
                                        <select class="form-control" name="kode_unik">
                                            <option>Pilih Invoice</option>
                                            @foreach($checkout as $checkouts)
                                            <option value="{{$checkouts->kode_unik}}">{{$checkouts->kode_unik}}</option>
                                            @endforeach
                                        </select><br>
                                        <button type="submit" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>Check Invoice</button>
                                        </form>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@endsection