@extends('layouts.admin')
@section('header', 'Kategori')

@section('content')
<div id="controller">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <a href="{{ route('category.create') }}"  action="" class="btn btn-sm btn-primary pull-right">Tambah Kategori</a>
            </div>
        </div>

        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead>
					<tr class="bg-indigo">
                        <th class="text-center" style="width: 10px">No</th>
                        <th class="text-center">Nama</th>
                        <th style="width: 200px" class="text-center">Tanggal Buat</th>
                        <th style="width: 200px"class="text-center">Tanggal Update</th>
                        <th style="width: 200px"class="text-center">Action</th>
					</tr>
				</thead>
                <tbody>
                    @foreach($categories as $keys => $category)
                    <tr>
                        <td>{{ $keys +1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">{{ $category->created_at }}</td>
                        <td class="text-center">{{ $category->updated_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-solid fa-pen"></i></a>
                            <form action="{{ route('category.destroy', $category->id) }}" class="d-inline" method="POST">
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