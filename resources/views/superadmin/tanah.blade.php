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
                                    <th>Panjang</th>
                                    <th>Lebar</th>
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
                                    <td>{{$row->panajang}}</td>
                                    <td>{{$row->lebar}}</td>
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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_sarana}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_sarana}}">
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
<div class="modal fade" id="modalUpdate{{$val->id_sarana}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="id_sarana" value="{{$val->id_sarana}}" class="form-control">
                        <label for="exampleFormControlInput1" class="form-label">{{join(" ",array_map("ucfirst",explode("_",$fil)))}}</label>
                        <input class="form-control form-control-sm" type="text" name="{{$fil}}" value="@if($val->id_sarana == true){{$val->$fil}}@endif" aria-label=".form-control-sm example">
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
<div class="modal fade" id="modalDelete{{$val->id_sarana}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/tanah/delete/{{$val->id_sarana}}" class="btn btn-danger">Delete</a>
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
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah bangunan
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id sarana</th>
                                    <th>Jenis bangunan</th>
                                    <th>Nama bangunan</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
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
                                    <td>{{$row->id_sarana}}</td>
                                    <td>{{$row->jenis_bangunan}}</td>
                                    <td>{{$row->nama_bangunan}}</td>
                                    <td>{{$row->panajang}}</td>
                                    <td>{{$row->lebar}}</td>
                                    <td>{{$row->luas_tapak}}</td>
                                    <td>{{$row->kepemilikan}}</td>
                                    <td>{{$row->tahun_dibangun}}</td>
                                    <td>{{$row->tgl_sk_pemakaian}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
@endsection