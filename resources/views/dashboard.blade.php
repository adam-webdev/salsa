@extends('layouts.layout')
@section('content')
    <div class="card p-2">
        <h4 class="p-2">Selamat Datang <b>{{ $user }}</b></h4>
        <p class="p-2 text-center">Status Shipment</p>
        <div class="row px-4 mt-3 justify-content-between align-items-center">
            <div class="col-md-1">
                <img src="{{ asset('asset/img/file.png') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $approve }}</p>
                <p>PIB Proses Approve</p>
            </div>
            <div class="col-md-1">
                <img src="{{ asset('asset/img/check.png') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $staff_approve }}</p>
                <p>Staff Approve</p>
            </div>

            <div class="col-md-1">
                <img src="{{ asset('asset/img/pembayaran.svg') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $pembayaran }}</p>
                <p>Payment</p>
            </div>
            <div class="col-md-1">
                <img src="{{ asset('asset/img/work-tools.png') }}" width="50px"alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $jalur_merah }}</p>
                <p>Red Zone</p>

            </div>
            <div class="col-md-1">
                <img src="{{ asset('asset/img/delivery2.png') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $delivery }}</p>
                <p>Delivery</p>
            </div>
            <div class="col-md-1">
                <img src="{{ asset('asset/img/ceklis.png') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $spv_verif }}</p>
                <p>Spv Verify</p>
            </div>
            <div class="col-md-1">
                <img src="{{ asset('asset/img/reject.png') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $reject }}</p>
                <p>Reject</p>
            </div>
        </div>

    </div>

    {{-- <div class="row align-items-center">
        <div class="col-md-4 ml-4">
            <img width="400px" height="400px" src="{{ asset('asset/img/company.svg') }}" alt="">
        </div>
        <div class="col-md-6">
            <div class="row">

                <div class="col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('user.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Pengguna</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $pengguna }}</p>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div> --}}
@endsection
