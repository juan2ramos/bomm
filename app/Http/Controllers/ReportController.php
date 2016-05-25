<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Group;
use Bomm\User;
use Illuminate\Http\Request;

use Bomm\Http\Requests;
use Jenssegers\Date\Date;

class ReportController extends Controller
{
    public function users()
    {
        $step = '';
        $groups = Group::with('call', 'related')->whereRaw('groups.id > 31')->get();
        return view('reportUsers', compact('groups','step'));
    }

    public function user($id)
    {
        $step = '';
        $group = Group::find($id);
        $representative = $group->user->representative;
        return view('reportUser', compact('group','step','representative'));
    }
}
