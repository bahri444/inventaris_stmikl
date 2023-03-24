@extends('layout.template')
@section('content')

<h2 class="header-header mx-auto">{{$title ?? ''}}</h2>
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
<!-- read data tanah -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah lahan
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis prasarana</th>
                                    <th>Nama prasarana</th>
                                    <th>No sertifikat tanah</th>
                                    <th>Panjang tanah</th>
                                    <th>Lebar tanah</th>
                                    <th>Luas lahan tersedia</th>
                                    <th>Kepemilikan</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>Nama dusun</th>
                                    <th>Desa kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kode pos</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($tanah as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->jenis_prasarana}}</td>
                                    <td>{{$row->nama_prasarana}}</td>
                                    <td>{{$row->no_sertifikat_tanah}}</td>
                                    <td>{{$row->panjang_tanah}}</td>
                                    <td>{{$row->lebar_tanah}}</td>
                                    <td>{{$row->luas_lahan_tersedia}}</td>
                                    <td>{{$row->kepemilikan}}</td>
                                    <td>{{$row->rt}}</td>
                                    <td>{{$row->rw}}</td>
                                    <td>{{$row->nama_dusun}}</td>
                                    <td>{{$row->desa_kelurahan}}</td>
                                    <td>{{$row->kecamatan}}</td>
                                    <td>{{$row->kode_pos}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_tanah}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_tanah}}">
                                                <i class="uil-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<!-- Modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah lahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tanah/addtanah" method="post">
                @csrf
                <div class="modal-body">
                    @foreach($fields as $fil)
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input class="form-control form-control-sm" type="{{ ($fil != 'panjang' && $fil != 'rt' && $fil != 'rw' && $fil != 'lebar' && $fil != 'kode_pos' ? 'text' : 'number') }}" name="{{$fil}}" aria-label=".form-control-sm example">
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

@foreach($tanah as $val)

<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->id_tanah}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update lahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tanah/updttanah" method="post">
                @csrf
                <div class="modal-body">
                    @foreach($fields as $fil)
                    <div class="mb-2">
                        <input type="hidden" name="id_tanah" value="{{$val->id_tanah}}" class="form-control">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input class="form-control form-control-sm" type="text" name="{{$fil}}" value="@if($val->id_tanah == true){{$val->$fil}}@endif" aria-label=".form-control-sm example">
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


<!-- Modal delete -->
<div class="modal fade" id="modalDelete{{$val->id_tanah}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/tanah/delete/{{$val->id_tanah}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end Modal delete -->
@endforeach

<!-- read data bangunan -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        <i class="uil-plus"></i>Tambah bangunan
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis bangunan</th>
                                    <th>Nama bangunan</th>
                                    <th>Panjang bangunan</th>
                                    <th>Lebar bangunan</th>
                                    <th>Luas tapak</th>
                                    <th>Kepemilikan</th>
                                    <th>Tahun dibangun</th>
                                    <th>Tanggal SK pemakaian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($bangunan as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->jenis_bangunan}}</td>
                                    <td>{{$row->nama_bangunan}}</td>
                                    <td>{{$row->panjang_bangunan}}</td>
                                    <td>{{$row->lebar_bangunan}}</td>
                                    <td>{{$row->luas_tapak}}</td>
                                    <td>{{$row->kepemilikan}}</td>
                                    <td>{{$row->tahun_dibangun}}</td>
                                    <td>{{$row->tanggal_sk_pemakaian}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteBangunan{{$row->id_bangunan}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#UpdateBangunan{{$row->id_bangunan}}">
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
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah bangunan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tanah/addbangunan" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prasarana</label>
                        <select name="id_tanah" class="form-select" aria-label="Default select example">
                            <option selected>pilih tanah</option>
                            @foreach($tanahid as $valId)
                            <option value="{{$valId->id_tanah}}">{{$valId->nama_prasarana}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($fieldsBangunan as $filb)
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$filb)))}}</label>
                        <input class="form-control form-control-sm" type="text" name="{{$filb}}" aria-label=".form-control-sm example">
                    </div>
                    @endforeach
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal SK</label>
                        <input class="form-control form-control-sm" type="date" name="tanggal_sk_pemakaian" aria-label=".form-control-sm example">
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

@foreach($bangunan as $val)
<!-- Modal update -->
<div class="modal fade" id="UpdateBangunan{{$val->id_bangunan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update bangunan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tanah/updtbangunan" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_bangunan" value="{{$val->id_bangunan}}" class="form-control">
                        <label for="exampleFormControlInput1" class="form-label">Prasarana</label>
                        <select name="id_tanah" class="form-select" aria-label="Default select example">
                            <option value="{{$val->id_tanah}}" selected>{{$val->nama_prasarana}}</option>
                            @foreach($tanahid as $valId)
                            <option value="{{$valId->id_tanah}}">{{$valId->nama_prasarana}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($fieldsBangunan as $filb)
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$filb)))}}</label>
                        <input class="form-control form-control-sm" type="text" name="{{$filb}}" value="{{$val->$filb}}" aria-label=".form-control-sm example">
                    </div>
                    @endforeach
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal SK</label>
                        <input class="form-control form-control-sm" type="date" name="tanggal_sk_pemakaian" value="{{$val->tanggal_sk_pemakaian}}" aria-label=".form-control-sm example">
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

<!-- Modal delete -->
<div class="modal fade" id="DeleteBangunan{{$val->id_bangunan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/tanah/deletebangunan/{{$val->id_bangunan}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end Modal delete -->
@endforeach

@endsection