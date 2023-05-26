@extends('layout.template')
@section('content')
<h2 class="header-header text-center">{{$title ?? ''}}</h2>
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
<!-- view count -->
<div>
    <div class="row">
        @foreach($getId_tahun_akademik_in_trxSarana as $value_id)
        @if ($value_id->id_tahun_akademik == Session::get('id_tahun_akademik'))
        <div class="col-6">
            <div class="row">
                <h4 class="text-center text-primary mt-1 mb-2">Room transaction</h4>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="uil-thumbs-up text-success" style="font-size: 30px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title text-nowrap mb-2 text-success fw-semibold">Like room</h5>
                            <h4 class="card-title text-nowrap mb-2 text-success fw-semibold">{{$masih_bagus}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="uil-feedback text-warning" style="font-size: 30px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title text-nowrap mb-2 text-warning fw-semibold">Medium broken room</h5>
                            <h4 class="card-title text-nowrap mb-2 text-warning fw-semibold">{{$rusak_sedang}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="uil-thumbs-down text-danger" style="font-size: 30px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title text-nowrap mb-2 text-danger fw-semibold">Don't like room</h5>
                            <h4 class="card-title text-nowrap mb-2 text-danger fw-semibold">{{$rusak_berat}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <h4 class="text-center text-primary mt-1 mb-2">Inventory transaction</h4>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="uil-thumbs-up text-success" style="font-size: 30px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title text-nowrap mb-2 text-success fw-semibold">Total inventory</h5>
                            <h4 class="card-title text-nowrap mb-2 text-success fw-semibold">{{$data_total_sarana}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="uil-feedback text-primary" style="font-size: 30px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title text-nowrap mb-2 text-primary fw-semibold">Inventory is like</h5>
                            <h4 class="card-title text-nowrap mb-2 text-primary fw-semibold">{{$total_sarana_like}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="uil-thumbs-down text-danger" style="font-size: 30px;"></i>
                                </div>
                            </div>
                            <h5 class="card-title text-nowrap mb-2 text-danger fw-semibold">Doesn't like inventory</h5>
                            <h4 class="card-title text-nowrap mb-2 text-danger fw-semibold">{{$jumlah_rusak}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<!-- view count -->
<div>
    <!-- view read data transaksi ruangan -->
    <h3 class="header-header text-center">Room transaction</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun akademik</th>
                                        <th>Nama ruang</th>
                                        <th>Kerusakan</th>
                                        <th>Nilai kerusakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1 ?>
                                    @foreach($transaksi_kondisi_ruang as $row)
                                    @if($row->id_tahun_akademik == Session::get('id_tahun_akademik'))
                                    <tr>
                                        <td>{{$k++}}</td>
                                        <td>{{$row->tahun}} - {{$row->semester}}</td>
                                        <td>{{$row->nama_ruang}}</td>
                                        <td>{{$row->kerusakan}}</td>
                                        <td>{{$row->nilai_kerusakan}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end-view read data transaksi ruangan -->
</div>

<div>
    <!-- view read data ruangan -->
    <h3 class="header-header text-center">Inventory transaction</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun akademik</th>
                                        <th>Nama sarana</th>
                                        <th>Jumlah total</th>
                                        <th>Jumlah like</th>
                                        <th>Jumlah rusak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1 ?>
                                    @foreach($transaksi_sarana_periodik as $value)
                                    @if($value->id_tahun_akademik == Session::get('id_tahun_akademik'))
                                    <tr>
                                        <td>{{$k++}}</td>
                                        <td>{{$value->tahun}} - {{$value->semester}}</td>
                                        <td>{{$value->nama_sarana}}</td>
                                        <td>{{$value->jumlah_total}}</td>
                                        <td>{{$value->jumlah_like}}</td>
                                        <td><?= $value->jumlah_total - $value->jumlah_like ?></td>
                                    </tr>
                                    @endif
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
</div>
@endsection