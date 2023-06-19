@extends('layout.template')
@section('content')<h2 class="header-header">{{$title ?? ''}}</h2>
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
                        <i class="uil-plus"></i>Tambah tahun akademik
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun semester</th>
                                    <th>Periodik semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($tahun_akademik as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->tahun}}</td>
                                    <td>{{$row->semester}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_tahun_akademik}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_tahun_akademik}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah tahun akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tahun_akademik/add_tahun_akademik" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Periodik semester</label>
                        <select name="semester" class="form-select" aria-label="Default select example">
                            <option selected>pilih semester</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Tahun akademik</label>
                        <input class="form-control form-control-sm" type="text" name="tahun" placeholder="masukkan tahun akademik" aria-label=".form-control-sm example">
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

@foreach($tahun_akademik as $val)
<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->id_tahun_akademik}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update tahun akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tahun_akademik/update_tahun_akademik" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_tahun_akademik" value="{{$val->id_tahun_akademik}}" class=".form-control-sm">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Periodik semester</label>
                        <select name="semester" class="form-select" aria-label="Default select example">
                            <option value="{{$val->semester}}" selected>{{$val->semester}}</option>
                            <option value="ganjil">ganjil</option>
                            <option value="genap">genap</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Tahun akademik</label>
                        <input class="form-control form-control-sm" type="text" name="tahun" value="{{$val->tahun}}" aria-label=".form-control-sm example">
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

<!-- Modal update -->
<div class="modal fade" id="modalDelete{{$val->id_tahun_akademik}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus tahun akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <div class="modal-body">
                <p>Yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a href="/tahun_akademik/delete_tahun_akademik/{{$val->id_tahun_akademik}}" class="btn btn-info">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- end Modal update -->
@endforeach
@endsection