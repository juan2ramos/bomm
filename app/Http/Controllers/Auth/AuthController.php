<?php

namespace Bomm\Http\Controllers\Auth;

use Bomm\Entities\Call;
use Bomm\Entities\Group;
use Bomm\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Bomm\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|confirmed',
            'password' => 'required|min:6|confirmed',
            'accept' => 'required',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'accept.required' => 'Debes aceptar las condiciones',
            'email.required' => 'El campo Email es obligatorio',
            'email.email' => 'Tiene que se un email valido',
            'email.unique' => 'Ya se encuentra registrado',
            'email.confirmed' => 'los email deben ser iguales',
            'password.required' => 'El campo Contraseña es obligatorio',
            'password.min' => 'El password debe tener mínimo 6 carateres',
            'password.confirmed' => 'las contraseñas deben de ser iguales',
        ]);
    }

    public function loginPath()
    {
        return route('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nombre' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 3,
        ]);
        $group = Group::create(['name' => $data['name'], 'user_id' => $user->id]);
        Call::create(
            [
                'inscripcion_inicial' => '2016',
                'convocatoria' => '2016',
                'fecha_registro' => new Carbon(),
                'id_grupos_musica' => $group->id
            ]);
        return $user;
    }

    public function getLogout()
    {
        Auth::Logout();
        Session::flush();
        return redirect('/');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if(Auth::user()->role == 3){
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

    public function postRegister(Request $request)
    {

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        /*if($user->role_id == 3){
            $agent = Agent::with('providers')->get()->sortBy(function($agent){return $agent->providers()->count();})->first();
            $provider = new Provider;
            $provider->agent_id = $agent->id;
            $provider->user_id = $user->id;
            $provider->save();
        }

        Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Bienvenido!');
        });*/

        auth()->loginUsingId($user->id);
        return redirect($this->redirectPath());
    }
}
