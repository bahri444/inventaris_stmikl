@extends('layout.template')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                <!-- Button trigger modal -->
                <div class="mb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil-plus"></i>Tambah
                    </button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama program studi</th>
                                    <th>Visi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($data_visi as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->JoinToTableProgramStudi->nama_program_studi}}</td>
                                    <td>{{$row->point_visi}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInfo{{$row->id_visi}}">
                                                <i class="uil-info"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id_visi}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id_visi}}">
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
<!-- end row-->

<!-- Modal add-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah visi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/visi/addvisi" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Program studi</label>
                        <select name="kode_program_studi" class="form-select" aria-label="Default select example">
                            <option selected>pilih program studi</option>
                            @foreach($program_studi as $prodi)
                            <option value="{{$prodi->kode_program_studi}}">{{$prodi->nama_program_studi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="point_visi" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Visi</label>
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
<!-- end-Modal add -->

@foreach($data_visi as $val)
<!-- Modal update-->
<div class="modal fade" id="modalUpdate{{$val->id_visi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update visi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/visi/updatevisi" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Program studi</label>
                        <select name="kode_program_studi" class="form-select" aria-label="Default select example">
                            <option value="{{$val->kode_program_studi}}" selected>{{$val->JoinToTableProgramStudi->nama_program_studi}}</option>
                            @foreach($program_studi as $prodi)
                            <option value="{{$prodi->kode_program_studi}}">{{$prodi->nama_program_studi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="point_visi" id="floatingTextarea2" style="height: 100px">{{$val->point_visi}}</textarea>
                            <label for="floatingTextarea2">Visi</label>
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
<!-- end-modal update -->

<!-- modal delete -->
<div class="modal fade" id="modalDelete{{$val->id_visi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/visi/deletevisi/{{$val->id_visi}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
@endsection