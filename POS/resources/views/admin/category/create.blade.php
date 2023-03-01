@extends('layouts.admin')
@section('header', 'Kategori')


@section('content')
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Tambah Kategori Baru</h3>
						</div>
                        <form action="{{ route('category.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection