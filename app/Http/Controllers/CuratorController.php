<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Call;
use Bomm\Entities\Group;
use Bomm\Entities\Score;
use Illuminate\Http\Request;

use Bomm\Http\Requests;
use Thujohn\Twitter\Facades\Twitter;

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

    /**
     * @param $view
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUser($view, $id)
    {

        $step = '';

        $group = Group::find($id);
        $score = $group->score()->first();
        $representative = $group->user->representative;
        $call = Call::whereRaw('id_grupos_musica = ' . $group->id . ' and convocatoria = 2016 ')->first();

        $iframe = strpos($group->video1, 'iframe');
        $iframe2 = strpos($group->video2, 'iframe');
        $iframe3 = strpos($group->video3, 'iframe');

        $iframeAudio = (strpos($group->audio1, 'iframe'))?true:(strpos($group->audio1, 'reverbnation'))?'reverbnation':false;

        $iframeAudio2 = strpos($group->audio2, 'iframe');
        $iframeAudio3 = strpos($group->audio3, 'iframe');

        if($group->twitter)
            $t = count(Twitter::getFollowersIds(['screen_name' => $group->twitter, 'count' => '4000'])->ids);
        if($group->facebook){
            if(strpos($group->facebook, 'facebook.com')){
                $porciones = explode("/", $group->facebook);
                $size = count($porciones) - 1 ;
                if(empty($porciones[$size])){
                    $group->facebook = $porciones[$size - 1];
                }else{
                    $group->facebook = $porciones[$size];
                }
            }

        }

        $title = ['presentation' => 'Presentación','musica' => 'Música','social' => 'Redes','videos' => 'Videos'];
        return view('curatorUser', compact('group', 'step', 'representative', 'call', 'view', 'id','score'
            ,'iframe','iframeAudio','iframe2','iframeAudio2','iframe3','iframeAudio3','title','t'));
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
