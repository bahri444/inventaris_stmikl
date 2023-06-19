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
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach($user as $row)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->role}}</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$row->id}}">
                                                <i class="uil-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$row->id}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/user/register" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input class="form-control form-control-sm" type="text" name="username" placeholder="masukkan username" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input class="form-control form-control-sm" type="email" name="email" placeholder="example@gmail.com" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input class="form-control form-control-sm" type="password" name="password" placeholder="masukkan password" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option selected>pilih hak akses</option>
                            <option value="superadmin">super admin</option>
                            <option value="pengguna">Pengguna</option>
                        </select>
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
<!-- modal update -->
@foreach($user as $val)
<div class="modal fade" id="modalUpdate{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update akun user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/user/update" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{$val->id}}" class="form-control">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input class="form-control form-control-sm" type="text" name="username" value="{{$val->username}}" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input class="form-control form-control-sm" type="email" name="email" value="{{$val->email}}" aria-label=".form-control-sm example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option value="{{$val->role}}" selected>{{$val->role}}</option>
                            <option value="superadmin">super admin</option>
                            <option value="pengguna">Pengguna</option>
                        </select>
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

<!-- modal delete -->
<div class="modal fade" id="modalDelete{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/user/delete/{{$val->id}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- end-modal delete -->
@endforeach
<!-- end-modal update -->
@endsection