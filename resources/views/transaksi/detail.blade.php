@extends('layouts.layout')
@section('title', 'Detail Transaksi')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi </h1>
        <!-- Button trigger modal -->
        <div>
            <a href="{{ route('all-shipment.print', [$transaksi->id]) }}" data-toggle="tooltip" title="Cetak Pdf"
                class="btn  btn-primary" style="color:rgb(255, 255, 255)">
                <i class="fas fa-print"></i>
                Cetak All Shipment
            </a>
            @hasanyrole('Admin|User')
                <a href="{{ route('transaksi.edit', [$transaksi->id]) }}" class="btn btn-success">
                    Edit Transaksi
                </a>
            @endhasanyrole
        </div>

    </div>

    <div class="card p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Nama Supplier </td>
                                <td>:</td>
                                <td>{{ $transaksi->nama_supplier }}</td>
                            </tr>
                            <tr>
                                <td>No PO </td>
                                <td>:</td>
                                <td>{{ $transaksi->no_po }}</td>
                            </tr>
                            <tr>
                                <td>Judul PO </td>
                                <td>:</td>
                                <td>{{ $transaksi->judul_po }}</td>
                            </tr>
                            <tr>
                                <td>Nilai PO </td>
                                <td>:</td>
                                <td>{{ $transaksi->nilai_po }}</td>
                            </tr>

                            <tr>
                                <td>Total Shipment </td>
                                <td>:</td>
                                <td>{{ $transaksi->total_shipment }}</td>
                            </tr>
                            <tr>
                                <td>Total Nilai Import </td>
                                <td>:</td>
                                <td>{{ $transaksi->total_nilai_import }} </td>
                            </tr>
                            <tr>
                                <td>Sisa Nilai Import </td>
                                <td>:</td>
                                <td>{{ $transaksi->remaining_amount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left">

                </div>
            </div>
        </div>
    </div>



    <div class="row m-3 ">
        @hasanyrole('Admin|User')
            <div class="col-md-6 flex-grow-1">
                <a href="{{ route('shipment.tambah', [$transaksi->id]) }}" class="btn btn-primary">Tambah Shipment</a>
            </div>
        @endhasanyrole
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No </th>
                            <th>Shipment </th>
                            <th>Nama Barang</th>
                            <th>Nilai Barang</th>
                            <th>ETD </th>
                            <th>ETA </th>
                            <th>Status </th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipment as $ship)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ship->shipment_no }}</td>
                                <td>{{ $ship->nama_barang }}</td>
                                <td>{{ $ship->nilai_barang }}</td>
                                <td>{{ $ship->etd_loading_port }}</td>
                                <td>{{ $ship->eta_unloading_port }}</td>
                                <td>{{ $ship->status }}</td>
                                <td>{{ $ship->keterangan_reject }}</td>
                                <td align="center" width="16%">
                                    <a href="{{ route('shipment.print', [$ship->id]) }}" data-toggle="tooltip"
                                        title="Cetak Pdf" class="btn btn-sm btn-primary" style="color:blues">
                                        <i class="fas fa-sm fa-print"></i>
                                    </a>

                                    <a href="{{ route('shipment.edit', [$ship->id]) }}" data-toggle="tooltip"
                                        title="Edit" class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </a>
                                    <a href="{{ route('shipment.show', [$ship->id]) }}" data-toggle="tooltip"
                                        title="Detail" class="d-none  d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-eye fa-sm text-white-50"></i>
                                    </a>
                                    @hasanyrole('Admin|User')
                                        <a href="/shipment/hapus/{{ $ship->id }}" data-toggle="tooltip" title="Hapus"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                        </a>
                                    @endhasanyrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
