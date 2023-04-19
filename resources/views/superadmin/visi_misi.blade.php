@extends('layout.template')
@section('content')
<!-- 
foreach(visimisi as val)
foreach(val->programStudi as row)
<p>val->kode_program_studi</p>

<p>row->nama_program_studi</p>
<p>val->visi</p>
<p>val->misi</p>

endforeach
endforeach 
=> cara diatas merupakan cara untuk menampilkan data yang menggunakan relasi eloquen 1 to N 
-->

<!-- $val->programStudi->nama_program_studi => cara menggunakan relasi 1 to 1 -->

<h2 class="header-header">{{$title ?? ''}}</h2><!-- title -->
<!-- alert -->
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
<!-- end-alert -->

<!-- view read data visi misi -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah visi misi
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode program studi</th>
                                    <th>Nama program studi</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($visimisi as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->kode_program_studi}}</td>
                                    <td>{{$row->programStudi->nama_program_studi}}</td>
                                    <td>{{$row->visi}}</td>
                                    <td>{{$row->misi}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_visi_misi}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_visi_misi}}">
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
<!-- end-view read data visi misi -->

<!-- Modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah visi & misi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/visi_misi/addvisimisi" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Kode program studi</label>
                        <select name="kode_program_studi" class="form-select" aria-label="Default select example">
                            <option selected>pilih program studi</option>
                            @foreach($program_studi as $valId)
                            <option value="{{$valId->kode_program_studi}}">{{$valId->nama_program_studi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Visi</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="visi" id="floatingTextarea"></textarea>
                            <label for="floatingSelect">masukkan visi program studi</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Misi</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="misi" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingSelect">masukkan misi program studi</label>
                        </div>
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

@foreach($visimisi as $val)
<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->id_visi_misi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update visi & misi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/visi_misi/updatevisimisi" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_visi_misi" value="{{$val->id_visi_misi}}" class=".form-control-sm">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Kode program studi</label>
                        <select name="kode_program_studi" class="form-select" aria-label="Default select example">
                            <option value="{{$val->kode_program_studi}}" selected>{{$val->programStudi->nama_program_studi}}</option>
                            @foreach($program_studi as $valId)
                            <option value="{{$valId->kode_program_studi}}">{{$valId->nama_program_studi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Visi</label>
                        <textarea class="form-control" name="visi" placeholder="{{$val->visi}}" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Misi</label>
                        <textarea class="form-control" name="misi" placeholder="{{$val->misi}}" id="exampleFormControlTextarea1" rows="3"></textarea>
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
<div class="modal fade" id="modalDelete{{$val->id_visi_misi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/visi_misi/deletevisimisi/{{$val->id_visi_misi}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
@endsection