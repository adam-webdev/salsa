<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    {{-- <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <style>
        table tbody tr {
            border-bottom: 1px solid black !important;
        }

        td {
            font-size: 20px;
        }

        .header {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        .header img {
            margin-left: 270px;
        }

        td input {
            font-size: 16px;
        }

        input {
            padding: 6px 10px;
            width: 300px;

        }

        h4 {
            font-size: 22px;
        }

        .hr-transaksi {
            color: grey;
            height: 1px;
        }

        .font-bold {
            font-weight: bold;
            color: rgb(53, 51, 51)
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="asset/img/inalum.png" alt="" width="200px">
        <h2 style="text-align:center">Laporan Shipment Supplier {{ $shipment[0]->supplier }}</h2>
    </div>
    <hr>
    <hr>
    <div class="card p-4">
        <h4>Transaksi </h4>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Nama Supplier </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->nama_supplier }}</td>
                </tr>
                <tr>
                    <td>No PO </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->no_po }}</td>
                </tr>
                <tr>
                    <td>Judul PO </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->judul_po }}</td>
                </tr>
                <tr>
                    <td>Nilai PO </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->nilai_po }}</td>
                </tr>

                <tr>
                    <td>Total Shipment </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->total_shipment }}</td>
                </tr>
                <tr>
                    <td>Total Nilai Import </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->total_nilai_import }} </td>
                </tr>
                <tr>
                    <td>Sisa Nilai Import </td>
                    <td>:</td>
                    <td class="font-bold">{{ $shipment[0]->transaksi->remaining_amount }}</td>
                </tr>
            </tbody>
        </table>
        {{-- <hr class="hr-transaksi"> --}}
        @foreach ($shipment as $shipment)
            <hr>
            <h4>No Shipment : {{ $loop->iteration }}</h4>
            <hr>
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h4> <b> 1. General Information </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        {{-- <input type="hidden" name="transaksi_id" value="{{ $transaksi_id }}"> --}}
                        <td>a. Subjec Of Contract (*)</td>
                        <td><input value="{{ $shipment->subject_of_contract ?? ('-' ?? '-') }}" class="form-control"
                                type="text" readonly></td>
                    </tr>
                    <tr>
                        <td>b. Supplier / Vendor (*)</td>
                        <td><input value="{{ $shipment->supplier ?? '-' }}" class="form-control" type="text"
                                name="supplier" readonly required>
                        </td>
                    </tr>
                    <tr>
                        <td>c. Contract No (*)</td>
                        <td><input value="{{ $shipment->contract_no ?? '-' }}" class="form-control" type="text"
                                readonly name="contract_no" required></td>
                    </tr>
                    <tr>
                        <td>d. Quantity Contract (*)</td>
                        <td><input value="{{ $shipment->quantity_contract ?? '-' }}" class="form-control" readonly
                                type="text" name="quantity_contract" required></td>
                    </tr>
                    <tr>
                        <td>d. Contract Amount (*)</td>
                        <td><input value="{{ $shipment->quantity_contract ?? '-' }}" class="form-control" readonly
                                type="text" name="contract_amount" required></td>
                    </tr>
                    <tr>
                        <td>e. Quantity Amount (*)</td>
                        <td>
                            <input value="{{ $shipment->contract_amount_curr ?? '-' }}" class="form-control" readonly
                                type="text" name="contract_amount" required>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>f. Retention Money </td>
                        <td><input value="{{ $shipment->retention_money ?? '-' }}" class="form-control" type="text"
                                name="retention_money" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>g. Term of Payment (*)</td>
                        <td>
                            <input value="{{ $shipment->contract_amount ?? '-' }}" class="form-control" type="text"
                                name="retention_money" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>h. Issuing Bank LC (*)</td>
                        <td><input value="{{ $shipment->issuing_bank_lc ?? '-' }}" class="form-control" type="text"
                                name="issuing_bank_lc" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>i. Deliery Term Condition (*)</td>
                        <td>
                            <input value="{{ $shipment->delivery_term_condition ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>j. Requester Section / PIC (*)</td>
                        <td><input value="{{ $shipment->pic ?? '-' }}" class="form-control" type="text"
                                name="pic" required readonly>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <h4> <b> 2. Information For Custom Clearence </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. Shipment No (*)</td>
                        <td><input value="{{ $shipment->shipment_no ?? '-' }}" class="form-control" type="text"
                                name="shipment_no" required readonly></td>

                    </tr>
                    <tr>
                        <td> Shipment Sequence (*)</td>
                        <td><input value="{{ $shipment->shipment_sequence ?? '-' }}" class="form-control"
                                type="text" name="shipment_sequence" readonly></td>
                    </tr>
                    <tr>
                        <td>b. Nama Barang (*)</td>
                        <td><input value="{{ $shipment->nama_barang ?? '-' }}" class="form-control" type="text"
                                name="nama_barang" readonly></td>
                    </tr>
                    <tr>
                        <td> Total Nilai Import (*)</td>
                        <td><input value="{{ $shipment->nilai_barang ?? '-' }}" class="form-control" type="text"
                                name="nilai_barang" readonly></td>
                    </tr>
                    <tr>
                        <td>c. Function Of Goods (*)</td>
                        <td><input value="{{ $shipment->function_of_good ?? '-' }}" class="form-control" type="text"
                                name="function_of_good" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>d. Quantity Delivery (*)</td>
                        <td><input value="{{ $shipment->quantity_delivery ?? '-' }}" class="form-control"
                                type="text" name="quantity_delivery" readonly></td>
                    </tr>
                    <tr>
                        <td>e. Invoice Amount Currency (*)</td>
                        <td>
                            <input value="{{ $shipment->invoice_amount_curr ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>
                        </td>

                    </tr>

                    <tr>
                        <td> Invoice amount (*)</td>
                        <td><input value="{{ $shipment->invoice_amount ?? '-' }}" class="form-control" type="text"
                                name="invoice_amount" readonly></td>
                    </tr>
                    <tr>
                        <td>f. Quantity Balance (*)</td>
                        <td><input value="{{ $shipment->quantity_balance ?? '-' }}" class="form-control"
                                type="text" name="quantity_balance" readonly></td>
                    </tr>

                    <tr>
                        <td>g. Remaining contract Currency (*)</td>
                        <td>
                            <input value="{{ $shipment->remaining_contract_curr ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>
                        </td>

                    </tr>

                    <tr>
                        <td> Remaining contract amount (*)</td>
                        <td><input value="{{ $shipment->remaining_contract_amount ?? '-' }}" class="form-control"
                                type="text" name="remaining_contract_amount" readonly></td>
                    </tr>
                    <tr>
                    <tr>
                        <td>h. Name Of Vessel (*) </td>
                        <td>
                            <input value="{{ $shipment->name_of_vessel ?? '-' }}" class="form-control"
                                type="text" name="name_of_vessel" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>i. Shipper / Exportir (*)</td>
                        <td>
                            <input value="{{ $shipment->shipper ?? '-' }}" class="form-control" type="text"
                                name="shipper" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>j. Consignee / Notify party (*)</td>
                        <td>
                            <input value="{{ $shipment->consignee ?? '-' }}" class="form-control" type="text"
                                name="consignee" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>k. Issuing Insurance Company (*) </td>
                        <td>
                            <input value="{{ $shipment->issuing_insurance_company ?? '-' }}" class="form-control"
                                type="text" name="issuing_insurance_company" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>l. Amount of Insurance Currency (*)</td>
                        <td>
                            <input value="{{ $shipment->amount_of_insurance_curr ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>

                        </td>

                    </tr>

                    <tr>
                        <td> Amount of Insurance (*) </td>
                        <td><input value="{{ $shipment->amount_of_insurance ?? '-' }}" class="form-control"
                                type="text" name="amount_of_insurance" readonly></td>
                    </tr>
                    <tr>
                        <td>m. Loading Port (*)</td>
                        <td>
                            <input value="{{ $shipment->loading_port ?? '-' }}" class="form-control" type="text"
                                name="loading_port" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>n. ETD Loading Port (*)</td>
                        <td><input value="{{ $shipment->etd_loading_port ?? '-' }}" class="form-control"
                                type="text" name="etd_loading_port" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>o. Unloading Port (*)</td>
                        <td>
                            <input value="{{ $shipment->unloading_port ?? '-' }}" class="form-control"
                                type="text" name="unloading_port" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>p. ETA Unloading Port (*)</td>
                        <td><input value="{{ $shipment->eta_unloading_port ?? '-' }}" class="form-control"
                                type="text" name="eta_unloading_port" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>q. Exp Delivery Time (*)</td>
                        <td><input value="{{ $shipment->exp_delivery_time ?? '-' }}" class="form-control"
                                type="text" name="exp_delivery_time" readonly>
                        </td>
                    </tr>
                    {{-- shipping document  --}}
                    <tr>
                        <td>
                            <h4> <b> 3. Shipping Document </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. BL No (*)</td>
                        <td><input value="{{ $shipment->bl_no ?? '-' }}" class="form-control" readonly
                                type="text" name="bl_no" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right:10px!important;"> Date (*)</td>
                        <td><input value="{{ $shipment->bl_date ?? '-' }}" class="form-control" type="text"
                                name="bl_date" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" class="form-control " readonly name="bl_file"
                                type="text">
                            {{-- <iframe allowfullscreen="true" loading="lazy" webkitallowfullscreen class="mt-2"
                            type="application/pdf" src="/storage/{{ $shipment->bl_file }} " frameBorder="0"
                            height="300px" width="100%"></iframe>
                        @error('bl_file')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror --}}
                        </td>
                    </tr>

                    <tr>
                        <td>b. Invoice No </td>
                        <td><input value="{{ $shipment->invoice_no ?? '-' }}" class="form-control " type="text"
                                name="invoice_no" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input value="{{ $shipment->invoice_date ?? '-' }}" class="form-control" type="text"
                                name="invoice_date" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control" readonly
                                name="invoice_file">
                            {{-- <iframe allowfullscreen="true" loading="lazy" webkitallowfullscreen class="mt-2"
                            type="application/pdf" src="/storage/{{ $shipment->invoice_file }} " frameBorder="0"
                            scrolling="auto" height="300px" width="100%" id="iframe"></iframe> --}}

                        </td>
                    </tr>
                    <tr>
                        <td>c. Packing List </td>
                        <td><input value="{{ $shipment->packing_list ?? '-' }}" class="form-control" type="text"
                                min="1" name="packing_list" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input value="{{ $shipment->packing_date ?? '-' }}" class="form-control" type="text"
                                name="packing_date" readonly>

                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control" readonly
                                name="packing_file">

                        </td>
                    </tr>
                    <tr>
                        <td>d. Cert Of Origin</td>
                        <td>
                            <input value="{{ $shipment->cert_of_origin ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control" readonly
                                name="cert_of_origin_file">

                        </td>
                    </tr>
                    <tr>
                        <td>e. Cert Of Origin Prefensial</td>
                        <td>
                            <input value="{{ $shipment->cert_of_origin_prefensial ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>( PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control" readonly
                                name="cert_of_origin_preferensial_file">

                        </td>
                    </tr>
                    <tr>
                        <td>f. Cert Of Weight (C/W)</td>
                        <td><input value="{{ $shipment->cert_of_weight ?? '-' }}" class="form-control"
                                type="text" name="cert_of_weight" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control " readonly
                                name="cert_of_weight_file">

                        </td>
                    </tr>
                    <tr>
                        <td>g. Insurance Document</td>
                        <td><input value="{{ $shipment->insurance_document ?? '-' }}" class="form-control"
                                type="text" name="insurance_document" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>
                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control " readonly
                                name="insurance_file">

                        </td>
                    </tr>
                    <tr>
                        <td>h. Fumigation Certificate</td>
                        <td><input value="{{ $shipment->fumigation_certificate ?? '-' }}" class="form-control"
                                type="text" name="fumigation_certificate" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control " readonly
                                name="fumigation_file">

                        </td>
                    </tr>
                    <tr>
                        <td>i. Letter Of Credit (L/C) No. (*)</td>
                        <td><input value="{{ $shipment->letter_of_credit ?? '-' }}" class="form-control"
                                type="text" name="letter_of_credit" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input value="{{ $shipment->letter_of_credit_date ?? '-' }}" class="form-control"
                                type="text" name="letter_of_credit_date" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control " readonly
                                name="letter_of_credit_file">

                        </td>
                    </tr>
                    <tr>
                        <td>j. Doc Budget Of Availabily</td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-" readonly
                                name="doc_budget_of_available_file">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 4. Goverment Decree </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. SPI Besi & Baja No. & Date.
                            <small>( PDF)</small>
                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control  "
                                name="spi_besi_baja" readonly>

                        </td>
                    </tr>
                    <tr>
                        <td>b. Quota Kartu Kendali Atas SPI Besi & Baja No. & Date.
                            <small>(PDF)</small>
                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control " readonly
                                name="quota_kartu_kendali">

                        </td>
                    </tr>
                    <tr>
                        <td>c. NPIK No. & Date.
                            <small>(PDF)</small>
                        </td>
                        <td><input value="{{ '-' }}" class="form-control" type="text" readonly
                                name="npik">

                        </td>
                    </tr>
                    <tr>
                        <td>d. Surat Pengecualin Import Lainnya.
                            <small>( PDF)</small>

                        </td>
                        <td><input value="{{ '-' }}" type="text" class="form-control " readonly
                                name="surat_pengecualian_import">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 5. Import Duty & Other Tax </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> HS No. <small>(*)</small> </td>
                        <td><input value="{{ $shipment->hs_no ?? '-' }}" class="form-control" type="text"
                                name="hs_no" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>BM. <small>(*)</small></td>
                        <td><input value="{{ $shipment->bm ?? '-' }}" class="form-control" type="text"
                                name="bm" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> PPN. <small>(*)</small></td>
                        <td><input value="{{ $shipment->ppn ?? '-' }}" class="form-control" type="text"
                                name="ppn" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td> PPH. <small>(*)</small></td>
                        <td>
                            <input value="{{ $shipment->pph ?? '-' }}" class="form-control" type="text"
                                name="pph" readonly>
                        </td>
                    </tr>
                    <tr id="status-tr">
                        <td> Status (*)</td>
                        <td>
                            <input value="{{ $shipment->status ?? '-' }}" class="form-control" type="text"
                                name="retention_money" readonly>
                        </td>
                    </tr>
                    <tr id="reject">
                        <td> Keterangan direject</small></td>
                        <td>

                            <input value="{{ $shipment->keterangan_reject ?? '-' }}" class="form-control"
                                type="text" name="retention_money" readonly>
                        </td>
                        </td>
                    </tr>


                </tbody>

            </table>
        @endforeach
    </div>


</body>

</html>
