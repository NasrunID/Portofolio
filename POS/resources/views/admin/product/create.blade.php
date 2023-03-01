@extends('layouts.admin')
@section('header', 'Produk')

@section('content')
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Create New Transaction</h3>
						</div>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group row">
									<label class="col-md-2">Kode Produk</label>
									<input type="text" name="code" class="form-control col-md-3" required="">
									<label class="col-md-2" style="margin-left: 105px">Kategori</label>
                                    <select name="category_id" class="col-md-3">
                                        <option value=" ">Select Kategori</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
								</div>
                                <div class="form-group row">
                                    <label class="col-md-2">Nama Produk</label>
									<input type="text" name="name" class="form-control col-md-10" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Deskripsi</label>
									<input type="text" name="description" class="form-control col-md-10" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Stok (pcs)</label>
									<input type="text" name="quantity" class="form-control col-md-2" required="">
                                    <label class="col-md-2" style="margin-left: 85px">Harga</label>
                                    <label style="float: left; width: 25px">Rp.</label>
                                    <input type="text" name="price" required="" class="form-control col-md-4 bg-secondary">
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-md-2">Image</label>
                                    <input
                                        type="file"
                                        class="col-md-5 @error('image') is-invalid @enderror"
                                        id="image"
                                        name="image"
                                        placeholder="Enter image"
                                        accept="image/*"
                                        required="">
                                </div>
                                
                                <!-- mengatur controller, lihat di video laravel web sandika -->


							</div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
