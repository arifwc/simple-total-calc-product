@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu Kantin</div>
                <div class="card-body">

                    @foreach ($menu as $item)
                        <div class="col-md-3 text-center">
                        <form action="/tambah" method="post">
                            {{ csrf_field() }}
                            <p>{{$item->menu}}</p>
                            <img width="128px" height="128px" class="img-responsive" src="{{ asset('image/'.$item->path_image) }}"><br>
                            <p>Rp. {{$item->harga}}</p>
                            <input type="hidden" value="{{$item->menu}}" name="menu">
                            <input type="hidden" value="{{$item->harga}}" name="harga">
                            <div class="col-xs-2">
                                <input class="form-control input-sm" type="text" name="jumlah">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info">Beli</button>
                        </form>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
