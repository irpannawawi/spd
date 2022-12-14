@extends('layout')
@section('page-title', 'Master')
@section('page-title-desc', 'Data Master')
@section('master-menu', 'mm-active')
@section('content')
<div class="card col-12">
	<div class="card-header p-2">
        <ul class="nav nav-tabs mt-1">
            <li class="nav-item">
                <a class="nav-link active" href="#" id="tab_pangkat" onclick="switch_tab('tab_pangkat')">Pangkat</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#" id="tab_satker" onclick="switch_tab('tab_satker')">Satker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="tab_tujuan" onclick="switch_tab('tab_tujuan')">Tujuan Perjalanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="tab_pembayaran" onclick="switch_tab('tab_pembayaran')">Pembayaran</a>
            </li>
        </ul>
	</div>
	<div class="card-body">
<!-- ======================== Pangkat ============================= -->
		<div class="content" id="content-tab_pangkat">
            <h3>Pangkat</h3>
            <button class="btn btn-sm btn-primary float-right mb-2" data-target="#addPangkatModal" data-toggle="modal">Tambah data</button>
            <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th class="text-lg p-0 m-0">No</th>
                        <th class="text-lg p-0 m-0">Nama Pangkat</th>
                        <th class="text-lg p-0 m-0">Golongan</th>
                        <th class="text-lg p-0 m-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($pangkat as $row)
                        <tr>
                            <td class="text-sm p-0 m-0">{{$n++}}</td>
                            <td class="text-sm p-0 m-0">{{$row->nama_pangkat}}</td>
                            <td class="text-sm p-0 m-0">{{$row->golongan}}</td>
                            <td class="text-sm p-0 m-0">
                                <button 
                                    class="btn btn-primary btn-sm" 
                                    onclick="fill_edit_pangkat('{{$row->id_pangkat}}','{{$row->nama_pangkat}}','{{$row->golongan}}')"
                                    data-toggle="modal" data-target="#editPangkatModal" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-primary btn-sm" onclick="return confirm('Hapus Pangkat?')" href="{{route('delete-pangkat',['id_pangkat'=>$row->id_pangkat])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

<!-- ======================== Satker ============================= -->
		<div class="content" id="content-tab_satker" style="display: none;">
            <h3>Satker</h3>
            <button class="btn btn-sm btn-primary float-right mb-2" data-target="#addSatkerModal" data-toggle="modal">Tambah data</button>
            <table class="table datatable-search-anggota">
                <thead>
                    <tr>
                        <th class="text-lg p-0 m-0">No</th>
                        <th class="text-lg p-0 m-0" nowrap>Nama Satker</th>
                        <th class="text-lg p-0 m-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($satker as $row)
                        <tr>
                            <td class="text-sm p-0 m-0">{{$n++}}</td>
                            <td class="text-sm p-0 m-0">{{$row->nama_satker}}</td>
                            <td class="text-sm p-0 m-0">
                                <button 
                                    class="btn btn-primary btn-sm" 
                                    onclick="fill_edit_satker('{{$row->id_satker}}','{{$row->nama_satker}}')"
                                    data-toggle="modal" data-target="#editSatkerModal" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-primary btn-sm" onclick="return confirm('Hapus Satker?')" href="{{route('delete-satker',['id_satker'=>$row->id_satker])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

<!-- ======================== Tujuan Perjalanan ============================= -->
		<div class="content" id="content-tab_tujuan" style="display: none;">
            <h3>Tujuan Perjalanan</h3>
            <button class="btn btn-sm btn-primary float-right mb-2" data-target="#addTujuanModal" data-toggle="modal">Tambah data</button>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th class="text-lg p-0 m-0">No</th>
                        <th class="text-lg p-0 m-0" nowrap>Nama Kota</th>
                        <th class="text-lg p-0 m-0" nowrap>Uang Harian</th>
                        <th class="text-lg p-0 m-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($tujuan as $row)
                        <tr>
                            <td class="text-sm p-0 m-0">{{$n++}}</td>
                            <td class="text-sm p-0 m-0">{{$row->nama_tujuan}}</td>
                            <td class="text-sm p-0 m-0">Rp. {{number_format($row->uang_harian,0,',','.')}},-</td>
                            <td class="text-sm p-0 m-0">
                                <button 
                                    class="btn btn-primary btn-sm" 
                                    onclick="fill_edit_tujuan('{{$row->id_tujuan}}','{{$row->nama_tujuan}}','{{$row->uang_harian}}')"
                                    data-toggle="modal" data-target="#editTujuanModal" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-primary btn-sm" onclick="return confirm('Hapus Tujuan?')" href="{{route('delete-tujuan',['id_tujuan'=>$row->id_tujuan])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<!-- ======================== Pembayaran ============================= -->
		<div class="content" id="content-tab_pembayaran" style="display: none;">
            <h3>Pembayaran</h3>
            <button class="btn btn-sm btn-primary float-right mb-2" data-target="#addPembayaranModal" data-toggle="modal">Tambah data</button>
            <table class="table datatable-search-anggota">
                <thead>
                    <tr>
                        <th class="text-lg p-0 m-0">No</th>
                        <th class="text-lg p-0 m-0" nowrap>Pembayaran</th>
                        <th class="text-lg p-0 m-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($pembayaran as $row)
                        <tr>
                            <td class="text-sm p-0 m-0">{{$n++}}</td>
                            <td class="text-sm p-0 m-0">{{$row->pembayaran}}</td>
                            <td class="text-sm p-0 m-0">
                                <button 
                                    class="btn btn-primary btn-sm" 
                                    onclick="fill_edit_pembayaran('{{$row->id_pembayaran}}','{{$row->pembayaran}}')"
                                    data-toggle="modal" data-target="#editPembayaranModal" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-primary btn-sm" onclick="return confirm('Hapus Pembayaran?')" href="{{route('delete-pembayaran',['id_pembayaran'=>$row->id_pembayaran])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
</div>
@endsection
@section('modal')
<x-modal_edit_pangkat />
<x-modal_add_pangkat />

<x-modal_edit_satker />
<x-modal_add_satker />

<x-modal_edit_status />
<x-modal_add_status />

<x-modal_edit_tujuan />
<x-modal_add_tujuan />

<x-modal_edit_pembayaran />
<x-modal_add_pembayaran />
@endsection

@section('extra-js')


<script>
function switch_tab(tabId){
    console.log(tabId)
    $('.nav-link').removeClass('active')
    $('#'+tabId).addClass("active")
    $('.content').hide();
    $('#content-'+tabId).show();
}

function fill_edit_pangkat(id, nama, golongan)
{
    console.log({id:id, nama:nama})
    $('#form-pangkat-id').val(id);
    $('#form-pangkat-nama').val(nama);
    $('#form-pangkat-golongan').val(golongan);
}


function fill_edit_satker(id, nama)
{
    console.log({id:id, nama:nama})
    $('#form-satker-id').val(id);
    $('#form-satker-nama').val(nama);
}

function fill_edit_pembayaran(id, nama)
{
    console.log({id:id, nama:nama})
    $('#form-pembayaran-id').val(id);
    $('#form-pembayaran').val(nama);
}

function fill_edit_status(id, nama)
{
    console.log({id:id, nama:nama})
    $('#form-status-id').val(id);
    $('#form-status-nama').val(nama);
}

function fill_edit_tujuan(id, nama, uang)
{
    
    $('#form-tujuan-id').val(id);
    $('#form-tujuan-nama').val(nama);
    $('#form-tujuan-uang_harian').val(uang);
}
</script>

@if(session('tab'))
<script>
$('#tab_{{session('tab')}}').click();
</script>
@endif
@endsection