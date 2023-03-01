@extends('layouts.layout')
@section('title', 'Edit Shipment')
@section('content')
    @include('sweetalert::alert')
    <div class="card p-4">
        <h4>Edit shipment</h4>
        <form action="{{ route('shipment.update', [$shipment->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row pl-2">
                <small>(*) Wajib di isi!</small> <br>
                <small class="ml-4">(PDF) File harus berformat PDF!</small>
            </div>
            <table class="table ">
                <tbody>
                    @hasanyrole('Admin|User')
                        <tr>
                            <td>
                                <h4> <b> 1. General Information </b></h4>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            {{-- <input type="hidden" name="transaksi_id" value="{{ $transaksi_id }}"> --}}
                            <td>a. Subjec Of Contract (*)</td>
                            <td><input value="{{ $shipment->subject_of_contract }}" class="form-control" type="text"
                                    name="subject_of_contract" required readonly></td>
                        </tr>
                        <tr>
                            <td>b. Supplier / Vendor (*)</td>
                            <td><input value="{{ $shipment->supplier }}" class="form-control" type="text" name="supplier"
                                    required readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>c. Contract No (*)</td>
                            <td><input value="{{ $shipment->contract_no }}" class="form-control" type="number"
                                    name="contract_no" required readonly></td>
                        </tr>
                        <tr>
                            <td>d. Quantity Contract (*)</td>
                            <td><input id="quantity_contract" value="{{ $shipment->quantity_contract }}" class="form-control"
                                    type="number" min="1" name="quantity_contract" required></td>
                        </tr>
                        <tr>
                            <td> Unit(*)</td>
                            <td><select class="form-control" name="quantity_contract_unit" id="" required>
                                    {{-- <option value="">-- pilih opsi --</option> --}}
                                    <option value="Pcs" {{ $shipment->quantity_contract_unit == 'Pcs' ? 'selected' : '' }}>
                                        Pcs
                                    </option>
                                    <option value="Kg" {{ $shipment->quantity_contract_unit == 'Kg' ? 'selected' : '' }}>Kg
                                    </option>
                                    <option value="Set" {{ $shipment->quantity_contract_unit == 'Set' ? 'selected' : '' }}>
                                        Set</option>
                                    <option value="Ton" {{ $shipment->quantity_contract_unit == 'Ton' ? 'selected' : '' }}>
                                        Ton</option>
                                    <option value="MT" {{ $shipment->quantity_contract_unit == 'MT' ? 'selected' : '' }}>MT
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>d. Contract Amount (*)</td>
                            <td><input value="{{ $shipment->contract_amount }}" class="form-control" type="number"
                                    name="contract_amount" required></td>
                        </tr>
                        <tr>
                            <td>e. Quantity Amount (*)</td>
                            <td><select class="form-control" name="contract_amount_curr" id="">

                                    <option value="USD" {{ $shipment->contract_amount_curr == 'USD' ? 'selected' : '' }}>USD
                                    </option>
                                    <option value="JPY" {{ $shipment->contract_amount_curr == 'JPY' ? 'selected' : '' }}>JPY
                                    </option>
                                    <option value="EUR" {{ $shipment->contract_amount_curr == 'EUR' ? 'selected' : '' }}>EUR
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>f. Retention Money </td>
                            <td><input value="{{ $shipment->retention_money }}" class="form-control" type="text"
                                    name="retention_money">
                            </td>
                        </tr>
                        <tr id='term-tr'>
                            <td>g. Term of Payment (*)</td>
                            <td><select class="form-control" name="term_of_payment" id="term">
                                    <option value="TT" {{ $shipment->term_of_payment == 'TT' ? 'selected' : '' }}>TT
                                    </option>
                                    <option value="LC" {{ $shipment->term_of_payment == 'LC' ? 'selected' : '' }}>LC
                                    </option>
                                </select>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td>h. Issuing Bank LC (*)</td>
                            <td><input value="{{ $shipment->issuing_bank_lc }}" class="form-control" type="text"
                                    name="issuing_bank_lc">
                            </td>
                        </tr> --}}
                        <tr>
                            <td>i. Deliery Term Condition (*)</td>
                            <td><select class="form-control" name="delivery_term_condition" id="">
                                    <option value="EX work" {{ $shipment->contract_amount == 'EX work' ? 'selected' : '' }}>EX
                                        work</option>
                                    <option value="FOB" {{ $shipment->contract_amount == 'FOB' ? 'selected' : '' }}>FOB
                                    </option>
                                    <option value="CFR" {{ $shipment->contract_amount == 'CFR' ? 'selected' : '' }}>CFR
                                    </option>
                                    <option value="CIF" {{ $shipment->contract_amount == 'CIF' ? 'selected' : '' }}>CIF
                                    </option>
                                    <option value="DAP" {{ $shipment->contract_amount == 'DAP' ? 'selected' : '' }}>DAP
                                    </option>
                                    <option value="DDP" {{ $shipment->contract_amount == 'DDP' ? 'selected' : '' }}>DDP
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>j. Requester Section / PIC (*)</td>
                            <td><input value="{{ $shipment->pic }}" class="form-control" type="text" name="pic"
                                    required>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <h4> <b> 2. Information For Custom Clearence (*)</b></h4>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>a. Shipment No (*)</td>
                            <td><input value="{{ $shipment->shipment_no }}" class="form-control" type="text"
                                    name="shipment_no" required></td>

                        </tr>
                        <tr>
                            <td> Shipment Sequence (*)</td>
                            <td><input value="{{ $shipment->shipment_sequence }}" class="form-control" type="text"
                                    name="shipment_sequence" required></td>
                        </tr>
                        <tr>
                            <td>b. Nama Barang (*)</td>
                            <td><input value="{{ $shipment->nama_barang }}" class="form-control" type="text"
                                    name="nama_barang" required></td>
                        </tr>
                        <tr>
                            <td> Total Nilai Import (*)</td>
                            <td><input value="{{ $shipment->nilai_barang }}" class="form-control" type="text"
                                    name="nilai_barang" required></td>
                        </tr>
                        <tr>
                            <td>c. Function Of Goods (*)</td>
                            <td><input value="{{ $shipment->function_of_good }}" class="form-control" type="text"
                                    name="function_of_good" required>
                            </td>
                        </tr>
                        <tr>
                            <td>d. Quantity Delivery (*)</td>
                            <td><input id="quantity_delivery" value="{{ $shipment->quantity_delivery }}" class="form-control"
                                    type="text" name="quantity_delivery" required></td>
                        </tr>
                        <tr>
                            <td>e. Invoice Amount Currency (*)</td>
                            <td><select class="form-control" name="invoice_amount_curr" id="">
                                    <option value="USD" {{ $shipment->invoince_amount_curr == 'USD' ? 'selected' : '' }}>USD
                                    </option>
                                    <option value="JPY" {{ $shipment->invoince_amount_curr == 'JPY' ? 'selected' : '' }}>JPY
                                    </option>
                                    <option value="EUR" {{ $shipment->invoince_amount_curr == 'EUR' ? 'selected' : '' }}>EUR
                                    </option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td> Invoice amount (*)</td>
                            <td><input id="invoice_amount" value="{{ $shipment->invoice_amount }}" class="form-control"
                                    type="text" name="invoice_amount" required>
                            </td>
                        </tr>
                        <tr>
                            <td>f. Quantity Balance (*)</td>
                            <td><input value="{{ $shipment->quantity_balance }}" class="form-control" type="number"
                                    id="quantity_balance"name="quantity_balance" readonly required></td>
                        </tr>

                        <tr>
                            <td>g. Remaining contract Currency (*)</td>
                            <td><select class="form-control" name="remaining_contract_curr" id="" required>
                                    <option value="USD"
                                        {{ $shipment->remaining_contract_curr == 'USD' ? 'selected' : '' }}>
                                        USD</option>
                                    <option value="JPY"
                                        {{ $shipment->remaining_contract_curr == 'JPY' ? 'selected' : '' }}>
                                        JPY</option>
                                    <option value="EUR"
                                        {{ $shipment->remaining_contract_curr == 'EUR' ? 'selected' : '' }}>
                                        EUR</option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td> Remaining contract amount (*)</td>
                            <td><input id="remaining_amount" value="{{ $shipment->remaining_contract_amount }}"
                                    class="form-control" type="text" name="remaining_contract_amount" required readonly>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>h. Name Of Vessel (*) </td>
                            <td>
                                <input value="{{ $shipment->name_of_vessel }}" class="form-control" type="text"
                                    name="name_of_vessel" required>
                            </td>
                        </tr>
                        <tr>
                            <td>i. Shipper / Exportir (*)</td>
                            <td>
                                <input value="{{ $shipment->shipper }}" class="form-control" type="text" name="shipper"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>j. Consignee / Notify party (*)</td>
                            <td>
                                <input value="{{ $shipment->consignee }}" class="form-control" type="text"
                                    name="consignee" required>
                            </td>
                        </tr>
                        <tr>
                            <td>k. Issuing Insurance Company (*) </td>
                            <td>
                                <input value="{{ $shipment->issuing_insurance_company }}" class="form-control"
                                    type="text" name="issuing_insurance_company" required>
                            </td>
                        </tr>
                        <tr>
                            <td>l. Amount of Insurance Currency (*)</td>
                            <td><select class="form-control" name="amount_of_insurance_curr" id="" required>
                                    <option value="USD"
                                        {{ $shipment->amount_of_insurance_curr == 'USD' ? 'selected' : '' }}>USD</option>
                                    <option value="JPY"
                                        {{ $shipment->amount_of_insurance_curr == 'JPY' ? 'selected' : '' }}>JPY</option>
                                    <option value="EUR"
                                        {{ $shipment->amount_of_insurance_curr == 'EUR' ? 'selected' : '' }}>>EUR</option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td> Amount of Insurance (*) </td>
                            <td><input value="{{ $shipment->amount_of_insurance }}" class="form-control" type="text"
                                    name="amount_of_insurance" required></td>
                        </tr>
                        <tr>
                            <td>m. Loading Port (*)</td>
                            <td>
                                <input value="{{ $shipment->loading_port }}" class="form-control" type="text"
                                    name="loading_port" required>
                            </td>
                        </tr>
                        <tr>
                            <td>n. ETD Loading Port (*)</td>
                            <td><input value="{{ $shipment->etd_loading_port }}" id="etd" class="form-control"
                                    type="date" name="etd_loading_port" required>
                            </td>
                        </tr>
                        <tr>
                            <td>o. Unloading Port (*)</td>
                            <td>
                                <input value="{{ $shipment->unloading_port }}" class="form-control" type="text"
                                    name="unloading_port" required>
                            </td>
                        </tr>
                        <tr>
                            <td>p. ETA Unloading Port (*)</td>
                            <td><input value="{{ $shipment->eta_unloading_port }}" id="eta" class="form-control"
                                    type="date" name="eta_unloading_port" required>
                            </td>
                        </tr>
                        <tr>
                            <td>q. Exp Delivery Time (*)</td>
                            <td><input value="{{ $shipment->exp_delivery_time }}" id="exp" class="form-control"
                                    type="date" name="exp_delivery_time" required>
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
                            <td><input value="{{ $shipment->bl_no }}" class="form-control" type="text" name="bl_no"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right:10px!important;"> Date (*)</td>
                            <td><input value="{{ $shipment->bl_date }}" class="form-control" type="date" name="bl_date"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(*, PDF)</small>

                            </td>
                            <td><input value="{{ old('bl_file') ?? $shipment->bl_file }}"
                                    class="form-control  @error('bl_file') is-invalid @enderror" type="file"
                                    name="bl_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->bl_file }} " frameBorder="0" scrolling="auto"
                                    height="300px" width="100%"></iframe>
                                @error('bl_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>b. Invoice No </td>
                            <td><input value="{{ $shipment->invoice_no }}" class="form-control " type="text"
                                    name="invoice_no" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Date </td>
                            <td><input value="{{ $shipment->invoice_date }}" class="form-control" type="date"
                                    name="invoice_date" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(*, PDF)</small>

                            </td>
                            <td><input value="{{ old('invoice_file') ?? $shipment->invoice_file }}"
                                    class="form-control @error('invoice_file') is-invalid @enderror" type="file"
                                    name="invoice_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->invoice_file }} " frameBorder="0" scrolling="auto"
                                    height="300px" width="100%"></iframe>
                                @error('invoice_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>c. Packing List </td>
                            <td><input value="{{ $shipment->packing_list }}" class="form-control" type="number"
                                    min="1" name="packing_list" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Date </td>
                            <td><input value="{{ $shipment->packing_date }}" class="form-control" type="date"
                                    name="packing_date" required>

                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(*, PDF)</small>

                            </td>
                            <td><input value="{{ old('packing_file') ?? $shipment->packing_file }}"
                                    class="form-control @error('packing_file') is-invalid @enderror" type="file"
                                    name="packing_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->packing_file }} " frameBorder="0" scrolling="auto"
                                    height="300px" width="100%"></iframe>
                                @error('packing_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>d. Cert Of Origin</td>
                            <td><select class="form-control" name="cert_of_origin" id="">
                                    <option value="Form D" {{ $shipment->cert_of_origin == 'Form D' ? 'selected' : '' }}>Form
                                        D</option>
                                    <option value="E" {{ $shipment->cert_of_origin == 'E' ? 'selected' : '' }}>E</option>
                                    <option value="IJEPA" {{ $shipment->cert_of_origin == 'IJEPA' ? 'selected' : '' }}>IJEPA
                                    </option>
                                    <option value="AI" {{ $shipment->cert_of_origin == 'AI' ? 'selected' : '' }}>AI
                                    </option>
                                    <option value="AK" {{ $shipment->cert_of_origin == 'AK' ? 'selected' : '' }}>AK
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(PDF)</small>

                            </td>
                            <td><input value="{{ old('cert_of_origin_file') ?? $shipment->cert_of_origin_file }}"
                                    class="form-control @error('cert_of_origin_file') is-invalid @enderror" type="file"
                                    name="cert_of_origin_file">
                                @if ($shipment->cert_of_origin_file != '-')
                                    <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                        src="/storage/{{ $shipment->cert_of_origin_file }} " frameBorder="0"
                                        scrolling="auto" height="300px" width="100%"></iframe>
                                @endif
                                @error('cert_of_origin_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>e. Cert Of Origin Prefensial</td>
                            <td><select class="form-control" name="cert_of_origin_preferensial" id="">

                                    <option value="ICCEPA"
                                        {{ $shipment->cert_of_origin_prefensial == 'ICCEPA' ? 'selected' : '' }}>ICCEPA
                                    </option>
                                    <option value="AANZFTA"
                                        {{ $shipment->cert_of_origin_prefensial == 'AANZFTA' ? 'selected' : '' }}>AANZFTA
                                    </option>
                                    <option value="IJEPA"
                                        {{ $shipment->cert_of_origin_prefensial == 'IJEPA' ? 'selected' : '' }}>IJEPA</option>
                                    <option value="IECEPA"
                                        {{ $shipment->cert_of_origin_prefensial == 'IECEPA' ? 'selected' : '' }}>IECEPA
                                    </option>
                                    <option value="AHKFTA"
                                        {{ $shipment->cert_of_origin_prefensial == 'AHKFTA' ? 'selected' : '' }}>AHKFTA
                                    </option>
                                    <option value="AIFTA"
                                        {{ $shipment->cert_of_origin_prefensial == 'AIFTA' ? 'selected' : '' }}>AIFTA</option>
                                    <option value="AJCEP"
                                        {{ $shipment->cert_of_origin_prefensial == 'AJCEP' ? 'selected' : '' }}>AJCEP</option>
                                    <option value="AKFTA"
                                        {{ $shipment->cert_of_origin_prefensial == 'AKFTA' ? 'selected' : '' }}>AKFTA</option>
                                    <option value="ATIGA"
                                        {{ $shipment->cert_of_origin_prefensial == 'ATIGA' ? 'selected' : '' }}>ATIGA</option>s
                                    <option value="IACEPA"
                                        {{ $shipment->cert_of_origin_prefensial == 'IACEPA' ? 'selected' : '' }}>IACEPA
                                    </option>
                                    <option value="RCEP-ASEAN"
                                        {{ $shipment->cert_of_origin_prefensial == 'RCEP-ASEAN' ? 'selected' : '' }}>RCEP-ASEAN
                                    </option>
                                    <option value="RCEP-CHINA"
                                        {{ $shipment->cert_of_origin_prefensial == 'RCEP-CHINA' ? 'selected' : '' }}>RCEP-China
                                    </option>
                                    <option value="RCEP-JAPAN"
                                        {{ $shipment->cert_of_origin_prefensial == 'RCEP-JAPAN' ? 'selected' : '' }}>RCEP-Japan
                                    </option>
                                    <option value="RCEP-New Zaeland"
                                        {{ $shipment->cert_of_origin_prefensial == 'RCEP-New Zaeland' ? 'selected' : '' }}>
                                        RCEP-New Zaeland</option>
                                    <option value="RCEP-Korea"
                                        {{ $shipment->cert_of_origin_prefensial == 'RCEP-Korea' ? 'selected' : '' }}>RCEP-Korea
                                    </option>
                                    <option value="IKCEPA"
                                        {{ $shipment->cert_of_origin_prefensial == 'IKCEPA' ? 'selected' : '' }}>IKCEPA
                                    </option>
                                    <option value="RCEP-Australia"
                                        {{ $shipment->cert_of_origin_prefensial == 'RCEP-Australia' ? 'selected' : '' }}>
                                        RCEP-Australia</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>( PDF)</small>

                            </td>
                            <td><input
                                    value="{{ old('cert_of_origin_preferensial_file') ?? $shipment->cert_of_origin_preferensial_file }}"
                                    class="form-control @error('cert_of_origin_preferensial_file') is-invalid @enderror"
                                    type="file" name="cert_of_origin_preferensial_file">
                                @if ($shipment->cert_of_origin_prefensial_file != '-')
                                    <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                        src="/storage/{{ $shipment->cert_of_origin_prefensial_file }} " frameBorder="0"
                                        scrolling="auto" height="300px" width="100%"></iframe>
                                @endif
                                @error('cert_of_origin_preferensial_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>f. Cert Of Weight (C/W)</td>
                            <td><input value="{{ $shipment->cert_of_weight }}" class="form-control" type="text"
                                    name="cert_of_weight" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(*, PDF)</small>

                            </td>
                            <td><input value="{{ old('cert_of_weight_file') ?? $shipment->cert_of_weight_file }}"
                                    class="form-control @error('cert_of_weight_file') is-invalid @enderror" type="file"
                                    name="cert_of_weight_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->cert_of_weight_file }} " frameBorder="0" scrolling="auto"
                                    height="300px" width="100%"></iframe>
                                @error('cert_of_weight_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>g. Insurance Document</td>
                            <td><input value="{{ $shipment->insurance_document }}" class="form-control" type="text"
                                    name="insurance_document" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(*, PDF)</small>
                            </td>
                            <td><input value="{{ old('insurance_file') ?? $shipment->insurance_file }}"
                                    class="form-control @error('insurance_file') is-invalid @enderror" type="file"
                                    name="insurance_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->insurance_file }} " frameBorder="0" scrolling="auto"
                                    height="300px" width="100%"></iframe>
                                @error('insurance_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>h. Fumigation Certificate</td>
                            <td><input value="{{ $shipment->fumigation_certificate }}" class="form-control" type="text"
                                    name="fumigation_certificate">
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(PDF)</small>

                            </td>
                            <td><input value="{{ old('fumigation_file') ?? $shipment->fumigation_file }}"
                                    class="form-control @error('fumigation_file') is-invalid @enderror" type="file"
                                    name="fumigation_file">
                                @error('fumigation_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>i. Letter Of Credit (L/C) No. (*)</td>
                            <td><input value="{{ $shipment->letter_of_credit }}" class="form-control" type="text"
                                    name="letter_of_credit" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Date </td>
                            <td><input value="{{ $shipment->letter_of_credit_date }}" class="form-control" type="date"
                                    name="letter_of_credit_date" required>
                            </td>
                        </tr>
                        <tr>
                            <td> Upload
                                <small>(*, PDF)</small>

                            </td>
                            <td><input value="{{ old('letter_of_credit_file') ?? $shipment->letter_of_credit_file }}"
                                    class="form-control @error('letter_of_credit_file') is-invalid @enderror" type="file"
                                    name="letter_of_credit_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->letter_of_credit_file }} " frameBorder="0" scrolling="auto"
                                    height="300px" width="100%"></iframe>
                                @error('letter_of_credit_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
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
                            <td><input
                                    value="{{ old('doc_budget_of_available_file') ?? $shipment->doc_budget_of_available_file }}"
                                    class="form-control @error('doc_budget_of_available_file') is-invalid @enderror"
                                    type="file" name="doc_budget_of_available_file">
                                <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                    src="/storage/{{ $shipment->doc_budget_of_available_file }} " frameBorder="0"
                                    scrolling="auto" height="300px" width="100%"></iframe>
                                @error('doc_budget_of_available_file')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
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
                            <td><input value="{{ old('spi_besi_baja') ?? $shipment->spi_besi_baja }}"
                                    class="form-control @error('spi_besi_baja') is-invalid @enderror" type="file"
                                    name="spi_besi_baja">
                                @if ($shipment->spi_besi_baja != '-')
                                    <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                        src="/storage/{{ $shipment->spi_besi_baja }} " frameBorder="0" scrolling="auto"
                                        height="300px" width="100%"></iframe>
                                @endif
                                @error('spi_besi_baja')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>b. Quota Kartu Kendali Atas SPI Besi & Baja No. & Date.
                                <small>(PDF)</small>
                            </td>
                            <td><input value="{{ old('quota_kartu_kendali') ?? $shipment->quota_kartu_kendali }}"
                                    class="form-control @error('quota_kartu_kendali') is-invalid @enderror" type="file"
                                    name="quota_kartu_kendali">
                                @if ($shipment->quota_kartu_kendali != '-')
                                    <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                        src="/storage/{{ $shipment->quota_kartu_kendali }} " frameBorder="0"
                                        scrolling="auto" height="300px" width="100%"></iframe>
                                @endif
                                @error('quota_kartu_kendali')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>c. NPIK No. & Date.
                                <small>(PDF)</small>
                            </td>
                            <td><input value="{{ old('npik') ?? $shipment->npik }}"
                                    class="form-control @error('npik') is-invalid @enderror" type="file" name="npik">
                                @if ($shipment->npik != '-')
                                    <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                        src="/storage/{{ $shipment->npik }} " frameBorder="0" scrolling="auto"
                                        height="300px" width="100%"></iframe>
                                @endif
                                @error('npik')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>d. Surat Pengecualin Import Lainnya.
                                <small>( PDF)</small>

                            </td>
                            <td><input value="{{ old('surat_pengecualian_import') ?? $shipment->surat_pengecualian_import }}"
                                    class="form-control @error('surat_pengecualian_import') is-invalid @enderror"
                                    type="file" name="surat_pengecualian_import">
                                @if ($shipment->surat_pengecualian_import != '-')
                                    <iframe allowfullscreen="true" loading="lazy" class="mt-2" type="application/pdf"
                                        src="/storage/{{ $shipment->surat_pengecualian_import }} " frameBorder="0"
                                        scrolling="auto" height="300px" width="100%"></iframe>
                                @endif
                                @error('surat_pengecualian_import')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
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
                            <td><input value="{{ $shipment->hs_no }}" class="form-control" type="text" name="hs_no"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>BM. <small>(*)</small></td>
                            <td><input value="{{ $shipment->bm }}" class="form-control" type="text" name="bm"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td> PPN. <small>(*)</small></td>
                            <td><input value="{{ $shipment->ppn }}" class="form-control" type="text" name="ppn"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td> PPH. <small>(*)</small></td>
                            <td>
                                <input value="{{ $shipment->pph }}" class="form-control" type="text" name="pph"
                                    required>
                            </td>
                        </tr>
                    @endhasanyrole
                    @hasanyrole('Admin|Staff')
                        <tr id="status-tr">
                            <td> Status (*)</td>
                            <td><select class="form-control" name="status" id="status">
                                    <option value="Pembayaran" {{ $shipment->status == 'Pembayaran' ? 'selected' : '' }}>
                                        Pembayaran
                                    </option>
                                    <option value="Jalur Merah" {{ $shipment->status == 'Jalur Merah' ? 'selected' : '' }}>
                                        Jalur Merah
                                    </option>
                                    <option value="Delivery" {{ $shipment->status == 'Delivery' ? 'selected' : '' }}>Delivery
                                    </option>
                                    <option value="Approve" {{ $shipment->status == 'Approve' ? 'selected' : '' }}>Approve
                                    </option>
                                    <option value="Rejected" {{ $shipment->status == 'Rejected' ? 'selected' : '' }}>Rejected
                                    </option>
                                </select>
                            </td>
                        </tr>
                    @endhasanyrole
                    @hasanyrole('Manager')
                        <tr id="status-tr">
                            <td>Status (*)</td>
                            <td><select class="form-control" name="status" id="status">
                                    <option value="Approve" {{ $shipment->status == 'PIB Approve' ? 'selected' : '' }}>PIB
                                        Approve
                                    </option>
                                    <option value="Rejected" {{ $shipment->status == 'Rejected' ? 'selected' : '' }}>Rejected
                                    </option>
                                </select>
                            </td>
                        </tr>
                    @endhasanyrole


                </tbody>

            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

    <script>
        $(document).ready(function() {
            var totalNilaiImpor = "{{ $shipment->nilai_barang }}";
            var quantityContract = "{{ $shipment->quantity_contract }}";
            var quantityDelivery = "{{ $shipment->quantity_delivery }}";
            var quantityBalance = "{{ $shipment->quantity_balance }}";
            var issuing_bank_lc = "{{ $shipment->issuing_bank_lc }}";
            var top = "{{ $shipment->term_of_payment }}";

            var firstDate;
            var secondDate;
            var threeDate;
            var eta;
            var etd;
            var exp;
            $('#etd').on('input', function() {
                etd = $(this).val();
                etd_split = etd.split('-')
                firstDate = new Date();
                firstDate.setFullYear(etd_split[0], (etd_split[1] - 1), etd_split[2]);
            })

            $('#eta').on('input', function() {
                eta = $(this).val();
                eta_split = eta.split("-")

                secondDate = new Date();
                secondDate.setFullYear(eta_split[0], (eta_split[1] - 1), eta_split[2]);

                if (secondDate >= firstDate) {
                    swal({
                        title: 'Oops',
                        text: 'Tanggal ETA Unloading Port Tidak boleh melebihi Tanggal ETA Loading Port yaitu = ' +
                            eta,
                        type: 'warning',
                        // showCancelButton: true,
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Close',
                    }).then(() => {
                        if (result.value) {
                            // handle Confirm button click
                        } else {
                            // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        }
                    });
                    $('#eta').val('')
                }
            })
            $('#exp').on('input', function() {
                exp = $(this).val();
                exp_split = exp.split("-")

                threeDate = new Date();
                threeDate.setFullYear(exp_split[0], (exp_split[1] - 1), exp_split[2]);

                if (threeDate >= secondDate) {
                    swal({
                        title: 'Oops',
                        text: 'Tanggal EXP Delivery Time Tidak boleh melebihi Tanggal ETA Unloading Port yaitu = ' +
                            exp,
                        type: 'warning',
                        // showCancelButton: true,
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Close',
                    }).then(() => {
                        if (result.value) {
                            // handle Confirm button click
                        } else {
                            // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        }
                    });
                    $('#exp').val('')
                }
            })


            var remainingAmount = "{{ $shipment->remaining_contract_amount }}";
            var invoice_amount = "{{ $shipment->invoice_amount }}";
            var remaining_amount = 0;
            // $('#remaining_amount').val(remainingAmount)
            // $('#invoice_amount').val(invoice_amount)

            var quantity_balance = 0;
            var quantity_contract = 0;
            $('#quantity_contract').on('input', function() {
                quantity_contract = $(this).val()
                console.log(quantity_contract)
                $('#quantity_balance').val(quantity_contract)
                quantity_balance = quantity_contract
            })


            $('#invoice_amount').on('input', function() {
                var invoice = $(this).val()
                remaining_amount = remainingAmount - invoice
                if (remaining_amount < 0) {

                    swal({
                        title: 'Oops',
                        text: 'Invoice Amount tidak boleh melebihi Remaining contract amount  yaitu = ' +
                            remainingAmount,
                        type: 'warning',
                        // showCancelButton: true,
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Close',
                    }).then(() => {
                        if (result.value) {
                            // handle Confirm button click
                        } else {
                            // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        }
                    });
                    $('#invoice_amount').val(remainingAmount)
                    invoice = remainingAmount
                    remaining_amount = remainingAmount - invoice
                    // $('#remaining_amount').val(remaining_amount)

                }
                $('#remaining_amount').val(remaining_amount)

            })

            $('#quantity_delivery').on('input', function() {
                var quantity = $(this).val()
                quantity_balance = quantity_contract - quantity
                console.log(quantity_balance)
                if (quantity_balance < 0) {
                    swal({
                        title: 'Oops',
                        text: 'Quantity Delivery tidak boleh melebihi Quantity Balance yaitu =' +
                            quantity_contract,
                        type: 'warning',
                        // showCancelButton: true,
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Close',
                    }).then(() => {
                        if (result.value) {
                            // handle Confirm button click
                        } else {
                            // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        }
                    });

                    $('#quantity_delivery').val(quantity_contract)
                    quantity = quantity_contract
                    quantity_balance = quantity_contract - quantity
                }
                $('#quantity_balance').val(quantity_balance)

            })
            //Rejected , keterangan
            $('#status').on('change', function() {
                var status = $('#status').val()
                if (status == 'Rejected') {
                    $('#status-tr').after(
                        `
                        <tr id="reject">
                            <td> Keterangan direject</small></td>
                            <td>
                                <textarea class="form-control" rows="5" type="text" name="keterangan_reject" required></textarea>
                            </td>
                        </tr>
                        `
                    )
                } else {
                    $('#reject').remove()
                }
            })

            if (top == "LC") {
                if (issuing_bank_lc) {
                    $('#term-tr').after(`<tr id="lc">
                        <td>Issuing Bank LC (*)</td>
                        <td><input value="{{ $shipment->issuing_bank_lc }}" class="form-control" type="text"
                                name="issuing_bank_lc">
                        </td>
                    </tr>`)
                }

            } else {
                $('#lc').remove()
            }

            $('#term').on('change', function() {
                var term_value = $(this).val()
                if (term_value == 'LC') {
                    $('#term-tr').after(`<tr id="lc">
                        <td>Issuing Bank LC (*)</td>
                        <td><input value="{{ $shipment->issuing_bank_lc }}" class="form-control" type="text"
                                name="issuing_bank_lc">
                        </td>
                    </tr>`)
                } else {
                    $('#lc').remove()
                }


            })

        })
    </script>

@endsection
