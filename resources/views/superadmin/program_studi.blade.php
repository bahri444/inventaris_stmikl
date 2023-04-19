@extends('layout.template')
@section('content')

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

<!-- view read data ruangan -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah program studi
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($program_studi as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->kode_program_studi}}</td>
                                    <td>{{$row->nama_program_studi}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->kode_program_studi}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->kode_program_studi}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah program studi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/program_studi/addprogramstudi" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Kode program studi</label>
                        <input class="form-control form-control-sm" type="text" name="kode_program_studi" placeholder="masukkan kode program studi" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Nama program studi</label>
                        <input class="form-control form-control-sm" type="text" name="nama_program_studi" placeholder="masukkan nama program studi" aria-label=".form-control-sm example">
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

@foreach($program_studi as $val)
<!-- Modal update -->
<div class="modal fade" id="modalUpdate{{$val->kode_program_studi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah program studi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/program_studi/updateprogramstudi" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Kode program studi</label>
                        <input class="form-control form-control-sm" type="text" name="kode_program_studi" value="{{$val->kode_program_studi}}" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Nama program studi</label>
                        <input class="form-control form-control-sm" type="text" name="nama_program_studi" value="{{$val->nama_program_studi}}" aria-label=".form-control-sm example">
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
<div class="modal fade" id="modalDelete{{$val->kode_program_studi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/program_studi/deleteprogramstudi/{{$val->kode_program_studi}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
@endsection