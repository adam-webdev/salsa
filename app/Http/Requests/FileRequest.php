<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'subject_of_contract' => 'required',
            'contract_no' => 'required',
            'quantity_contract' => 'required',
            'supplier' => 'required',
            'contract_amount_curr' => 'required',
            'contract_amount' => 'required',
            'term_of_payment' => 'required',
            'delivery_term_condition' => 'required',
            'pic' => 'required',
            'function_of_good' => 'required',
            'shipment_no' => 'required',
            'shipment_sequence' => 'required',
            'nama_barang' => 'required',
            'nilai_barang' => 'required',
            'quantity_delivery' => 'required',
            'invoice_amount_curr' => 'required',
            'invoice_amount' => 'required',
            'remaining_contract_curr' => 'required',
            'remaining_contract_amount' => 'required',
            'name_of_vessel' => 'required',
            'shipper' => 'required',
            'consignee' => 'required',
            'issuing_insurance_company' => 'required',
            'amount_of_insurance_curr' => 'required',
            'amount_of_insurance' => 'required',
            'loading_port' => 'required',
            'etd_loading_port' => 'required',
            'unloading_port' => 'required',
            'eta_unloading_port' => 'required',
            'exp_delivery_time' => 'required',
            'bl_no' => 'required',
            'bl_date' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
            'packing_list' => 'required',
            'packing_date' => 'required',
            'cert_of_weight' => 'required',
            'insurance_document' => 'required',
            'letter_of_credit' => 'required',
            'letter_of_credit_date' => 'required',
            'hs_no' => 'required',
            'ppn' => 'required',
            'pph' => 'required',
            'bm' => 'required',
            'bl_file' => 'required|mimes:pdf',
            'invoice_file' => 'required|mimes:pdf',
            'packing_file' => 'required|mimes:pdf',
            'cert_of_origin_file' => 'mimes:pdf',
            'cert_of_origin_prefensial_file' => 'mimes:pdf',
            'cert_of_weight_file' => 'required|mimes:pdf',
            'insurance_file' => 'required|mimes:pdf',
            'fumigation_file' => 'mimes:pdf',
            'letter_of_credit_file' => 'required|mimes:pdf',
            'doc_budget_of_available_file' => 'required|mimes:pdf',
            'spi_besi_baja' => 'mimes:pdf',
            'quota_kartu_kendali' => 'mimes:pdf',
            'npik' => 'mimes:pdf',
            'surat_pengecualian_import' => 'mimes:pdf',
        ];
    }
}
