<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function create()
    {
	    $lead_types = DB::table('lead_types')->groupBy("type_id")->get();
	    $lead_pos_types = DB::table('lead_pos_types')->get();
	    $lead_xef_types_general = DB::table('lead_xef_types')->where("general",1)->orderBy("name", "asc")->get();
	    $lead_xef_types_specific = DB::table('lead_xef_types')->where("general",0)->orderBy("name", "asc")->get();
	    $lead_xef_soft_stock = DB::table('lead_xef_soft_stock')->get();
	    $lead_xef_soft_staff = DB::table('lead_xef_soft_staff')->get();
	    $lead_xef_soft_book = DB::table('lead_xef_soft_book')->get();
	    $lead_xef_soft_erp = DB::table('lead_xef_soft_erp')->get();
	    $lead_external_pos = DB::table('lead_external_pos')->get();
	    $lead_screens = DB::table('lead_screens')->get();
	    $lead_franchise = DB::table('lead_franchise')->get();

        return view('lead.create')
	        ->with('lead_types', $lead_types)
	        ->with('lead_pos_types', $lead_pos_types)
	        ->with('lead_xef_types_general', $lead_xef_types_general)
	        ->with('lead_xef_types_specific', $lead_xef_types_specific)
	        ->with('lead_xef_soft_stock', $lead_xef_soft_stock)
		    ->with('lead_xef_soft_staff', $lead_xef_soft_staff)
		    ->with('lead_xef_soft_book', $lead_xef_soft_book)
		    ->with('lead_xef_soft_erp', $lead_xef_soft_erp)
	        ->with('lead_external_pos', $lead_external_pos)
	        ->with('lead_screens', $lead_screens)
	        ->with('lead_franchise', $lead_franchise);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreLeadRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//Lead::create($request->all() + ['user_id' => Auth::id()]);

		//dd(request());
		$data = $this->validate(request(), [
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
			'screens_qty'   => 'required_if:screens,1|nullable|numeric',
		    'critical'      => 'required_if:segment,XEF-XS|nullable|numeric',
		    'cash_register' => 'required_if:segment,XEF-XS|nullable|numeric',
		    'printers'      => 'required_if:segment,XEF-XS|nullable|numeric',
		    'type_general'  => 'required_if:segment,XEF-XS',
			'type_specific' => 'required_if:segment,XEF-XS',
		    'franchise'     => 'required_if:segment,XEF-XS',
			'xef_soft_stock'        => 'required_unless:segment,XEF-XS',
			'xef_soft_stock_other'  => 'required_if:xef_soft_stock,-1|string|min:2|max:255',
			'xef_soft_staff'        => 'required_unless:segment,XEF-XS',
			'xef_soft_staff_other'  => 'required_if:xef_soft_staff,-1|string|min:2|max:255',
			'xef_soft_book'         => 'required_unless:segment,XEF-XS',
			'xef_soft_book_other'   => 'required_if:xef_soft_book,-1|string|min:2|max:255',
			'xef_soft_erp'          => 'required_unless:segment,XEF-XS',
			'xef_soft_erp_other'   => 'required_if:xef_soft_erp,-1|string|min:2|max:255',
        ]);
        $row = Lead::create($data + ['user_id' => Auth::id()]);

        return  redirect()->route('lead.show',[$row->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		///
		//////////////////////////////
		// RAW, ESTRUCTURAR EN PIVOT
		//////////////////////////////
		///
		///
		///
		///
		///
		///
		$lead = Lead::findOrFail($id);
		$proposals = array();

		// REVOXEF VERSION INFO
		$xefVersionCount = $lead->screens_qty + $lead->cash_register + $lead->printers;
		if($xefVersionCount<=2) $xefVersionKey = "xefBasic";
		elseif ($xefVersionCount<=4) $xefVersionKey = "xefPlus";
		else $xefVersionKey = "xefPro";

		array_push($proposals,DB::table('lead_proposals')->where("key", $xefVersionKey)->get()->first());

		// BACKOFFICE VERSION INFO
		$ownerQty = $lead->owner_qty;
		if($ownerQty<2) $ownerQty = "back";
		else $ownerQty = "master";

		if($lead->franchise == 1){
			$ownerQty = "masterFran";
		}

		array_push($proposals, DB::table('lead_proposals')->where("key", $ownerQty)->get()->first());


		// TYPO
		$typo = $lead->type_general;

		if ($typo == 1){ // CAFETERIA
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'commands')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'flow')->get()->first());
		}

		if ($typo == 2){ // BAR
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'flow')->get()->first());
		}

		if ($typo == 3){ // RESTAURANTE
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'commands')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'profiles')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kds')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'flow')->get()->first());
		}

		if ($typo == 4){ // DISCOTECA
			array_push($proposals, DB::table('lead_proposals')->where("key", 'job')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'profiles')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'flow')->get()->first());
		}

		if ($typo == 5){ // TAKE AWAY
			array_push($proposals, DB::table('lead_proposals')->where("key", 'job')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kds')->get()->first());
		}

		if ($typo == 6){ // DELIVERY
			array_push($proposals, DB::table('lead_proposals')->where("key", 'job')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'globo')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'deliveroo')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kds')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'dds')->get()->first());
		}

		if ($typo == 10){ // Hotel
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'commands')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'profiles')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kds')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'dds')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kiosk')->get()->first());
		}

		if ($typo == 11){ // KIOSK
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kiosk')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'globo')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'deliveroo')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kds')->get()->first());

		}

		if ($typo == 12){ // PANADERIA
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'commands')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'display')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'cashmachine')->get()->first());
		}

		if ($typo == 13){ // FOODTRUCK
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());

		}

		if ($typo == 14){ // COMIDA AL PESO
			array_push($proposals, DB::table('lead_proposals')->where("key", 'balanza')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'commands')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'display')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'kds')->get()->first());
		}

		if ($typo == 15){ // SOLO EVENTOS
			array_push($proposals, DB::table('lead_proposals')->where("key", 'balanza')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'intouch')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'commands')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'stock')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'control')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'display')->get()->first());
			array_push($proposals, DB::table('lead_proposals')->where("key", 'telecom')->get()->first());
		}

		return view('lead.proposal', compact('proposals'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}


	public function fetchTypeSegments(Request $request)
	{
		$value = $request->get("value");

		$data = DB::table('lead_types')->where("type_id", $value)->orderBy("type_id", "asc")->get();

		$output ='';
		foreach ($data as $row){
			$output .='<option value="'.$row->segment_id.'" data-content="<span class=\'hideOnDrop\'>Segmentación: </span> '.$row->segment.'">'.$row->segment.'</option>';
		}
		echo $output;
	}
}
