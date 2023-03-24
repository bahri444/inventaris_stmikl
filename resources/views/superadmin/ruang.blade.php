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
                        <i class="uil-plus"></i>Tambah ruang
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id bangunan</th>
                                    <th>Kode ruang</th>
                                    <th>Nama ruang</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Luas ruang</th>
                                    <th>Kapasitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($ruang as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->id_bangunan}}</td>
                                    <td>{{$row->kode_ruang}}</td>
                                    <td>{{$row->nama_ruang}}</td>
                                    <td>{{$row->panjang_ruang}}</td>
                                    <td>{{$row->lebar_ruang}}</td>
                                    <td>{{$row->luas_ruang}}</td>
                                    <td>{{$row->kapasitas}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_ruang}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_ruang}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/ruang/addruang" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Bangunan</label>
                        <select name="id_bangunan" class="form-select" aria-label="Default select example">
                            <option selected>pilih bangunan</option>
                            @foreach($bangunan as $valId)
                            <option value="{{$valId->id_bangunan}}">{{$valId->nama_bangunan}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($fields as $fil)
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input class="form-control form-control-sm" type="text" name="{{$fil}}" placeholder="masukkan {{join(' ',array_map('ucfirst',explode('_',$fil)))}}" aria-label=".form-control-sm example">
                    </div>
                    @endforeach
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

@foreach($ruang as $val)
<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->id_ruang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/ruang/updtruang" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_ruang" value="{{$val->id_ruang}}" class="form-control">
                        <label for="exampleFormControlInput1" class="form-label">Bangunan</label>
                        <select name="id_bangunan" class="form-select" aria-label="Default select example">
                            <option value="{{$val->id_bangunan}}" selected>{{$val->nama_bangunan}}</option>
                            @foreach($bangunan as $valId)
                            <option value="{{$valId->id_bangunan}}">{{$valId->nama_bangunan}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($fields as $fil)
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input class="form-control form-control-sm" type="text" name="{{$fil}}" value="{{$val->$fil}}" aria-label=".form-control-sm example">
                    </div>
                    @endforeach
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
<div class="modal fade" id="modalDelete{{$val->id_ruang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/ruang/delete/{{$val->id_ruang}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
@endsection