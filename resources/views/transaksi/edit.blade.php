@extends('layouts.layout')
@section('title', 'Edit Transaksi')
@section('css')
    <style>
        .nilai_po {
            border-radius: 4px 0 0 4px !important;
        }

        .nilai_po_curr {
            border-radius: 0 4px 4px 0 !important;
            width: 150px;
            background: rgb(230, 229, 229);
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaksi </h1>
    </div>

    <div class="card p-4">
        <form action="{{ route('transaksi.update', [$transaksi->id]) }}" method="POST">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="supplier">Nama Supplier :</label>
                            <input type="text" name="nama_supplier" value="{{ $transaksi->nama_supplier }}"
                                class="form-control" id="supplier" required>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_po">No PO :</label>
                            <input type="number" name="no_po" value="{{ $transaksi->no_po }}" class="form-control"
                                id="no_po" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul_po">Judul PO :</label>
                            <input type="text" name="judul_po" value="{{ $transaksi->judul_po }}" class="form-control"
                                id="judul_po" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nilai_po">Nilai PO :</label>
                            <div class="d-flex justify-content-between">

                                <input type="number" name="nilai_po" value="{{ $transaksi->nilai_po }}"
                                    class="form-control nilai_po" id="nilai_po" required>
                                <select width="30%" type="text" name="nilai_po_curr"
                                    class="form-control nilai_po_curr " id="nilai_po" required>
                                    <option value="USD" {{ $transaksi->nilai_po_curr == 'USD' ? 'selected' : '' }}>USD
                                    </option>
                                    <option value="JPY" {{ $transaksi->nilai_po_curr == 'JPY' ? 'selected' : '' }}>JPY
                                    </option>
                                    <option value="EUR" {{ $transaksi->nilai_po_curr == 'EUR' ? 'selected' : '' }}>EUR
                                    </option>
                                </select>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_shipment">Total Shipment :</label>
                            <input type="number" name="total_shipment" value="{{ $transaksi->total_shipment }}"
                                class="form-control" id="total_shipment" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_nilai_impor">Total Nilai Impor :</label>
                            <input type="number" name="total_nilai_impor" class="form-control" id="total_nilai_impor"
                                value="{{ $transaksi->total_nilai_import }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remaining_amount">Sisa Total Nilai Impor :</label>
                            <input type="number" name="remaining_amount" class="form-control" id="remaining_amount"
                                value="{{ $transaksi->remaining_amount }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="history.back()"> Batal</button>
                @hasanyrole('Admin|User')
                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                @endhasanyrole
            </div>
        </form>
    </div>
@endsection
