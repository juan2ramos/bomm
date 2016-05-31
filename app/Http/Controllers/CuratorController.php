<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Call;
use Bomm\Entities\Group;
use Bomm\Entities\Score;
use Illuminate\Http\Request;

use Bomm\Http\Requests;

class CuratorController extends Controller
{
    public function showUsers()
    {
        $step = '';
        $groups = Group::whereHas('call', function ($query) {
            $query->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
        })->with(['call' => function ($q) {
            $q->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
        }])->orderBy('id', 'desc')->where('curator_id', '1')->get();
        return view('curatorUsers', compact('groups', 'step'));
    }

    public function showUser($view, $id)
    {
        $step = '';

        $group = Group::find($id);
        $score = $group->score()->first();

        $representative = $group->user->representative;
        $call = Call::whereRaw('id_grupos_musica = ' . $group->id . ' and convocatoria = 2016 ')->first();
        return view('curatorUser', compact('group', 'step', 'representative', 'call', 'view', 'id','score'));
    }

    public function showUserSave(Request $request)
    {

        $data = $request->all();
        $score = Score::firstOrNew(['group_id' => $data['group_id']]);
        $score->fill($data);
        $score->save();
        $step = '';
        $groups = Group::whereHas('call', function ($query) {
            $query->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
        })->with(['call' => function ($q) {
            $q->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
        }])->orderBy('id', 'desc')->where('curator_id', '1')->get();
        return view('curatorUsers', compact('groups', 'step'));
    }
}
