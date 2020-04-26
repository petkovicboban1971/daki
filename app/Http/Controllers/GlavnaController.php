<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\glavna;
use App\objekat;
use App\radnja;

class GlavnaController extends Controller
{
    public function create()
    {
    	$objekat = objekat::all();
        return view('datepicker')->with(['objekti' => $objekat]);
    }

    public function datePicker(Request $request)
    {
    	$startdate=strtotime($request->get('date'));
    	for ($i=0; $i < 5; $i++) { 
    		$datepicker = new \App\glavna;
	        $datepicker->objekat_id = $request->get('objekat');
	        $datepicker->kolicina = $request->get('kolicina');
	        switch ($i) {
			    case "0":
			        $datepicker->datum=$request->get('date');
			        $datepicker->radnja_id = 1;
			        break;
			    case "1":
			        $datepicker->datum=date("Y-m-d", strtotime("+1 day", $startdate));
			        $datepicker->radnja_id = 2;
			        break;
			    case "2":
			        $datepicker->datum=date("Y-m-d", strtotime("+21 day", $startdate));
			        $datepicker->radnja_id = 3;
			        break;
			    case "3":
			        $datepicker->datum=date("Y-m-d", strtotime("+29 day", $startdate));
			        $datepicker->radnja_id = 4;
			        break;
			    case "4":
			        $datepicker->datum=date("Y-m-d", strtotime("+38 day", $startdate));
			        $datepicker->radnja_id = 5;
			        break;
			} 
	        $datepicker->save();
	    }
        return redirect('datepicker')->with('success', 'Podaci uspešno unešeni!');
    }

    public function update()
    {

    }


    {public function destroy($id)
    {
    	$startdate = strtotime(date("Y-m-d"));
		$enddate = strtotime("-6 weeks", $startdate);

		$datas = glavna::where('datum', '<', date("Y-m-d", $enddate))->get();
		foreach($datas as $data){
			$data->delete();
		}
		return redirect('/home')->with('success', 'Podaci uspešno obrisani!');
    }
}