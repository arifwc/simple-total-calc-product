@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Keranjang Belanja</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table table-striped">
                            <thead>
                                <tr>
                                        <th>Pesanan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                <tr>
                                    <td>{{$item->pesanan}}</td>
                                    <td>{{$item->totalharga/$item->jumlah}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{$item->totalharga}}</td>
                                </tr>
                                @endforeach 
                                <td></td>
                                    <td></td>
                                    <td>Total Pesanan</td>
                                    <td>{{$total}}</td>  
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection