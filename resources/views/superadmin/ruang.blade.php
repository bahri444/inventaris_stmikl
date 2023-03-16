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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah sarana
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
                                    <td>{{$row->panjang}}</td>
                                    <td>{{$row->lebar}}</td>
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
@endsection