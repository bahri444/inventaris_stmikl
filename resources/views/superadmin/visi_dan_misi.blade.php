@extends('layout.template')
@section('content')
@foreach($visi_dan_misi as $val)
@if($val->programStudi->nama_program_studi == 'Teknik Informatika')
<iframe src="/storage/file_visi_misi/{{$val->visi_dan_misi}}" width="100%" height="780px" style="border: solid black 2px;"></iframe>
@elseif($val->programStudi->nama_program_studi == 'Sistem Informasi')
<iframe src="/storage/file_visi_misi/{{$val->visi_dan_misi}}" width="100%" height="780px" style="border: solid black 2px;"></iframe>
@endif
@endforeach
@endsection