<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Country;
use Bomm\entities\Group;
use Bomm\entities\Music;
use Illuminate\Http\Request;

use Bomm\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    private $group;

    public function __construct()
    {
        $this->group = (Session::get('antique')) ?
            Music::find(Session::get('idGroup'))->normalizeData():
            Group::find(Session::get('idGroup'));

    }

    public function uploadPdfArtist(Request $request)
    {
        $imageName = str_random(40) . '**' . $request->file('pdf')->getClientOriginalName();
        $request->file('pdf')->move(base_path() . '/public/uploads/pdfGroups/', $imageName);
        $return = ['name' => $imageName, 'url' => url('/uploads/pdfGroups/' . $imageName), 'success' => true];
        return response()->json($return);
    }

    public function stepOne(Request $request)
    {
        return view('step1', ['group' => $this->group]);
    }

    public function stepTwo()
    {
        $countries = Country::orderBy('nombre')->get();
        return view('step2', compact('countries'));
    }

    public function stepThree()
    {
        return view('step3');
    }

    public function stepFour()
    {
        return view('step4');
    }
}
