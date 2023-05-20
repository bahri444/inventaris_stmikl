@extends('layout.landingpage')
@section('content')
<div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
    @foreach($visi as $v)
    @if($v->JoinToTableProgramStudi->nama_program_studi == "Teknik Informatika")
    <h5 class="text-center mt-4 mb-2">{{$v->JoinToTableProgramStudi->nama_program_studi}}</h5>
    <h6 class="text-center mt-4 mb-2">Visi</h6>
    <p style="text-align: justify;">{{$v->point_visi}}</p>
    @endif
    @endforeach
    <h6 class="text-center mt-4 mb-2">Misi</h6>
    <ol>
        @foreach($data as $val)
        @if($val->kode_program_studi==12345)
        <li>{{$val->point_misi}}</li>
        <ul style="text-align: justify;">
            @foreach($val->JoinToTableSubMisi as $row)
            <li>{{$row->point_sub_misi}}</li>
            @endforeach
        </ul>
        @endif
        @endforeach
    </ol>
</div>
@endsection