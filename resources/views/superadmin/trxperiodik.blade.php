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
                        <i class="uil-plus"></i>Tambah periodik
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama sarana</th>
                                    <th>Jumlah total</th>
                                    <th>Jumlah like</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($trxperiodik as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->nama_sarana}}</td>
                                    <td>{{$row->jumlah_total_trx}}</td>
                                    <td>{{$row->jumlah_like_trx}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_sarana_periodik}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_sarana_periodik}}">
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
            <form action="/trxperiodik/addtrxperiodik" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sarana</label>
                        <select name="id_sarana" class="form-select" aria-label="Default select example">
                            <option selected>pilih sarana</option>
                            @foreach($sarana as $ValId)
                            <option value="{{$ValId->id_sarana}}">{{$ValId->nama_sarana}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        @foreach($fields as $fil)
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input type="text" name="{{$fil}}" class="form-control" placeholder="masukkan {{join(' ',array_map('ucfirst',explode('_',$fil)))}}">
                        @endforeach
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

@foreach($trxperiodik as $val)
<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->id_sarana_periodik}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update transaksi ruang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/trxperiodik/updttrxperiodik" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_sarana_periodik" value="{{$val->id_sarana_periodik}}">
                        <label for="exampleFormControlInput1" class="form-label">Sarana</label>
                        <select name="id_sarana" class="form-select" aria-label="Default select example">
                            @foreach($sarana as $ValId)
                            <option value="{{$ValId->id_sarana}}">{{$ValId->nama_sarana}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        @foreach($fields as $fil)
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input type="text" name="{{$fil}}" class="form-control" value="{{$val->$fil}}">
                        @endforeach
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
<div class="modal fade" id="modalDelete{{$val->id_sarana_periodik}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/trxperiodik/delete/{{$val->id_sarana_periodik}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
@endsection