@extends('layouts.admin')
@section('header', 'Produk')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <a href="{{ route('product.create') }}"  action="" class="btn btn-sm btn-primary pull-right">Tambah Produk Baru</a>
            </div>
        </div>

        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead>
					<tr class="bg-indigo">
                        <th style="width: 10px">No</th>
                        <th  class="text-center">Gambar</th>
						<th style="width: 300px" class="text-center">Kode Produk</th>
						<th  class="text-center">Nama Produk</th>
						<th  class="text-center">Deskripsi</th>
						<th  class="text-center">Harga</th>
						<th  class="text-center">QTY</th>
						<th style="width: 200px" class="text-center">Action</th>
					</tr>
				</thead>
                <tbody>
                    @foreach($products as $keys => $product)
                    <tr>
                        <td>{{ $keys +1 }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/' .$product->image) }}" style="width: 40px; height:40px" alt="{{ 'Gambar '. $product->name }}">
                        </td>
                        <td class="text-center">{{ $product->code }}</td>
                        <td class="text-center">{{ $product->name }}</td>
                        <td class="text-center">{{ $product->description }}</td>
                        <td class="text-center">{{ $product->price }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="text-center">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-solid fa-pen"></i></a>
                            <form action="{{ route('product.destroy', $product->id) }}" class="d-inline" method="POST">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection