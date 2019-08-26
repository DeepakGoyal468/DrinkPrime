<?php

namespace App\Http\Controllers;
use App\lead;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function getLeadList()
    {
        $leads = lead::all();
        return view('leadlist',['leads'=>$leads]);
    }

    public function addLead(Request $request)
    {   
        $this->validation($request);
        $items = new lead;
    	$items->name = $request->name;
    	$items->contact = $request->contact;
        $items->email = $request->email;
        $items->address = $request->address;
        $items->area = $request->area;
        $items->save();
        $leads = lead::all();
        return redirect('/leadlist')->with('leads', $leads);
    }

    public function getLeadDetails(Request $request)
    {
        $lead = lead::findOrFail($request->id);
        return view('viewlead', ['lead'=>$lead]);
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'name' => 'required|max:225',
            'email' => 'required|email',
            'contact' => 'required|max:10',
            'address' => 'required|max:225',
            'area' => 'required|max:225'
        ]);
    }

}
