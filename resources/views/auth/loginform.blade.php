@extends('layout.landingpage')
@section('content')
<div class="row mt-2 mb-5">
    <div class="col-sm-12 col-lg-7 mx-auto">
        <div class="card mt-5 mb-2">
            <!-- <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="text-center">Basic Form</h4>
                </div>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <img src="/assets/logo/logo_kampus.png" class="rounded mx-auto d-block mt-4" style="max-width:150px" alt="404">
                        <div class="card-body">
                            <div class="h-100 mt-1">
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-1">INVENTARIS <br> STMIK LOMBOK</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <div>
                            <h5 class="text-center mb-3">Login</h5>
                        </div>
                        <form action="/user/login" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="email">Email <span class="text text-danger">*</span></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="email@gmail.com" aria-label="default input example">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Password <span class="text text-danger">*</span></label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="input password" aria-label="default input example">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pwd">Periodik semester <span class="text text-danger">*</span></label>
                                <select name="id_tahun_akademik" class="form-select" aria-label="Default select example">
                                    <option selected>pilih periodik semester</option>
                                    @foreach($tahunakademik as $ta)
                                    <option value="{{$ta->id_tahun_akademik}}">{{$ta->tahun}}:{{$ta->semester}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary col-12">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection