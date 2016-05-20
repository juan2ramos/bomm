<?php

namespace Bomm\Http\Controllers\Auth;

use Bomm\Entities\Call;
use Bomm\Entities\Group;
use Bomm\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function getEmailSubject()
    {
        return 'Restaurar contraseña BOmm';
    }

    public function redirectPath()
    {
        if (!is_null($group = Auth::user()->musics()->first())) {
            Session::put('idGroup', $group->id);
            Session::put('antique', 1);
            return route('dashboard');
        }
        if (!is_null($group = Auth::user()->group()->first())) {
            Session::put('idGroup', $group->id);
            Session::put('antique', 0);
            return route('dashboard');

        }

        /*
         * esto solo sucede una sola ves con usuarios antiguos que no tienen grupo
         *
         * */
        $group  = Group::create(['name' => Auth::user()->nombre, 'user_id' => Auth::user()->id]);
        Call::create(
            [
                'inscripcion_inicial' => '2000',
                'convocatoria' => '2016',
                'fecha_registro' => new Carbon(),
                'id_grupos_musica' => $group->id
            ]);
        return route('dashboard');
    }
}
