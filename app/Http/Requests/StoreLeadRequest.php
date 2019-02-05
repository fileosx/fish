<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
		    'company'  => 'required|string|min:3|max:255',
		    'name'      => 'required|string|min:6|max:255',
		    'email'     => 'required|string|email|max:255',
		    'phone'     => 'required|numeric|digits_between:9,12',
		    'city'      => 'required|string|min:3|max:255',
		    'type'      => 'required',
		    'segment'   => 'required',
		    'owner_qty'     => 'required_if:segment,XEF-XS|nullable|numeric',
		    'capacity'      => 'required_if:segment,XEF-XS|nullable|numeric',
		    'external_pos' => 'required_if:segment,XEF-XS',
		    'pos_type'      => 'required_if:segment,XEF-XS',
		    'screens'       => 'required_if:segment,XEF-XS',
		    'screens_qty'   => 'required_if:screens,1|numeric',
		    'critical'      => 'required_if:segment,XEF-XS|nullable|numeric',
		    'cash_register' => 'required_if:segment,XEF-XS|nullable|numeric',
		    'printers'      => 'required_if:segment,XEF-XS|nullable|numeric',
		    'type_general'  => 'required_if:segment,XEF-XS',
		    'type_specific' => 'required_if:segment,XEF-XS',
		    'franchise'     => 'required_unless:segment,XEF-XS',
		    'xef_soft_stock'        => 'required_unless:segment,XEF-XS',
		    'xef_soft_stock_other'  => 'required_if:xef_soft_stock,-1|string|min:2|max:255',
		    'xef_soft_staff'        => 'required_unless:segment,XEF-XS',
		    'xef_soft_staff_other'  => 'required_if:xef_soft_staff,-1|string|min:2|max:255',
		    'xef_soft_book'         => 'required_unless:segment,XEF-XS',
		    'xef_soft_book_other'   => 'required_if:xef_soft_book,-1|string|min:2|max:255',
		    'xef_soft_erp'          => 'required_unless:segment,XEF-XS',
		    'xef_soft_erp_other'   => 'required_if:xef_soft_erp,-1|string|min:2|max:255',
	    ];
    }

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			// UPDATED @ LANG-CUSTOM
		];
	}
}
