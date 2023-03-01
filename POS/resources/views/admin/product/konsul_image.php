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
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    var actionUrl = '{{ route('product.index') }}';
    var apiUrl = '{{ route('api.product') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'image', class: 'text-left', orderable: false},
        {data: 'code', class: 'text-left', orderable: true},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'description', class: 'text-left', orderable: false},
        {data: 'price', class: 'text-left', orderable: false},
        {data: 'quantity', class: 'text-center', orderable: false},
        {render: function(index, row, data, meta) {
            return `
                <a class="btn btn-sm btn-secondary" onclick="controller.showData(${data.id})">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <a class="btn btn-sm btn-warning" onclick="controller.editData(${data.id})">
                    <i class="fa fa-solid fa-pen"></i>
                </a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id} )">
                    <i class="fa fa-trash"></i>
                </a>`;
            }, orderable: false, width: '200px', class: 'text-center'},
        ];

        var controller = new Vue({
            el: "#controller",
            data: {
                datas: [],
                data: {},
                transaction: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function () {
                this.dataTable();
            },
            methods: {
                dataTable() {
                    const _this = this;
                    _this.table = $("#dataTable")
                        .DataTable({
                            ajax: {
                                url: _this.apiUrl,
                                type: "GET",
                            },
                            columns,
                        })
                        .on("xhr", function () {
                            _this.datas = _this.table.ajax.json().data;
                        });
                },
                showData(id) {
                    window.location.href = this.actionUrl+'/'+id;
                },

                editData(id) {
                    window.location.href = this.actionUrl+'/'+id+'/edit';
                },
                deleteData(event, id) {
                    if (confirm("Are you sure?")) {
                        $(event.target).parents("tr").remove();
                        axios
                            .post(this.actionUrl + "/" + id, { _method: "DELETE" })
                            .then((response) => {
                                alert("Data berhasil dihapus");
                            });
                    }
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus
                        ? this.actionUrl
                        : this.actionUrl + "/" + id;
                    axios
                        .post(actionUrl, new FormData($(event.target)[0]))
                        .then((response) => {
                            $("#modal-default").modal("hide");
                            _this.table.ajax.reload();
                        });
                },
            },
        });


</script>


@endsection