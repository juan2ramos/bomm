<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Call;
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

        $groups = Group::whereHas('call', function ($query) {
            $query->whereRaw('convocatoria = 2016');

        })->with('call')->get();

        $registers = Group::where('id', '>' ,'32')->count();
        $finish = Call::whereRaw('convocatoria = 2016 and fecha_finalizacion IS NOT NULL ')->count();
        $thirteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 ')->count();
        $fourteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 ')->count();
        $fifteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 ')->count();

        $thirteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and fecha_finalizacion IS NOT NULL')->count();
        $fourteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and fecha_finalizacion IS NOT NULL')->count();
        $fifteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and fecha_finalizacion IS NOT NULL')->count();

        return view('reportUsers', compact('groups', 'step','registers','finish', 'thirteen','fourteen','fifteen', 'thirteenFinish','fourteenFinish','fifteenFinish'));


    }

    public function user($id)
    {
        $step = '';
        $group = Group::find($id);
        $representative = $group->user->representative;
        $call = Call::whereRaw('id_grupos_musica = ' . $group->id . ' and convocatoria = 2016 ')->first();
        return view('reportUser', compact('group', 'step', 'representative', 'call'));
    }
}
