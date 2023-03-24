@extends('layout.template')
@section('content')
<h2 class="header-header">{{$title ?? ''}}</h2>
<div class="col-sm-11 col-md-6 col-lg-4 mx-auto mb-1">
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
</div>

<!-- view read data ruangan -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah trx ruang
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama ruang</th>
                                    <th>Kerusakan</th>
                                    <th>Nilai kerusakan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($trxRuang as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->nama_ruang}}</td>
                                    <td>{{$row->kerusakan}}</td>
                                    <td>{{$row->nilai_kerusakan}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_trx}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_trx}}">
                                                <i class="uil-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end-view read data ruangan -->

<!-- Modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah transaksi ruang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/trxruang/addtrxruang" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ruangan</label>
                        <select name="id_ruang" class="form-select" aria-label="Default select example">
                            <option selected>pilih ruang</option>
                            @foreach($ruang as $valId)
                            <option value="{{$valId->id_ruang}}">{{$valId->nama_ruang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kerusakan</label>
                        <select name="kerusakan" class="form-select" aria-label="Default select example">
                            <option selected>pilih jenis kerusakan</option>
                            <option value="tidak ada kerusakan">Tidak ada kerusakan</option>
                            <option value="rusak sedang">Rusak sedang</option>
                            <option value="rusak berat">Rusak berat</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Nilai kerusakan</label>
                        <input class="form-control form-control-sm" type="number" name="nilai_kerusakan" placeholder="masukkan nilai kerusakan" aria-label=".form-control-sm example">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Modal add -->

@foreach($trxRuang as $val)
<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->id_trx}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update transaksi trx</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/trxruang/updttrxruang" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_trx" value="{{$val->id_trx}}" class="form-control">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ruangan</label>
                        <select name="id_ruang" class="form-select" aria-label="Default select example">
                            <option value="{{$val->id_ruang}}" selected>{{$val->nama_ruang}}</option>
                            @foreach($ruang as $valId)
                            <option value="{{$valId->id_ruang}}">{{$valId->nama_ruang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kerusakan</label>
                        <select name="kerusakan" class="form-select" aria-label="Default select example">
                            <option value="{{$val->kerusakan}}" selected>{{$val->kerusakan}}</option>
                            <option value="tidak ada kerusakan">Tidak ada kerusakan</option>
                            <option value="rusak sedang">Rusak sedang</option>
                            <option value="rusak berat">Rusak berat</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Nilai kerusakan</label>
                        <input class="form-control form-control-sm" type="text" name="nilai_kerusakan" value="{{$val->nilai_kerusakan}}" aria-label=".form-control-sm example">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Modal update -->

<!-- modal delete -->
<div class="modal fade" id="modalDelete{{$val->id_trx}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data ini..?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                <a href="/trxruang/delete/{{$val->id_trx}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
@endsection