<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Call;
use Bomm\Entities\Country;
use Bomm\Entities\Group;
use Bomm\Entities\Music;
use Bomm\Entities\Related;
use Bomm\Entities\Representative;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Bomm\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    private $validator;
    public function uploadPdfArtist(Request $request)
    {
        $imageName = str_random(40) . '**' . $request->file('pdf')->getClientOriginalName();
        $request->file('pdf')->move(base_path() . '/public/uploads/pdfGroups/', $imageName);
        $return = ['name' => $imageName, 'url' => url('/uploads/pdfGroups/' . $imageName), 'success' => true];
        return response()->json($return);
    }

    public function stepOne()
    {
        return view('step1', ['group' => $this->getGroup(), 'step' => 1]);
    }

    public function stepOnePost(Request $request)
    {
        $group = $this->getGroupNew();
        $return = $this->saveStepOne($request, $group);

        if (Session::get('antique'))
            $this->createCallStepOne($group);

        return ($return == 'back') ? back() : ($return == 'error') ? back()->withErrors($this->validator) : redirect()->route('stepTwo');

    }

    private function getGroup()
    {
        if (is_null($group = Group::where('user_id', Auth::user()->id)->first()) && Session::get('antique')) {
            return Music::find(Session::get('idGroup'))->normalizeData();
        }
        return $group;
    }

    /*
     *
     * Todos los usuarios nuevos tienen grupo, si es nuevo siempre retorna el grupo
     * Si el usuario no tiene grupo y es antiguo le crea
     *
     *  */
    private function getGroupNew()
    {
        if (is_null($group = Group::where('user_id', Auth::user()->id)->first()) && Session::get('antique')) {
            return new Group();
        }
        return $group;
    }

    /*
     *  Solo usuarios antiguos
     *  Si el usuario ya tiene un registro en call con convocatoria 2016 y grupo retorna
     *  Si no tiene registro en call busca el registro con el ID de grupos_musica "Music"
     *  Si el usuario no tiene  call con el ID de grupos_musica crea uno nuevo con convocatoria 2016
     *  de lo tenerlo ingresa inscripcion_inicial con la del anterior call
     *
     *  */
    private function createCallStepOne($group)
    {
        $call = Call::whereRaw('id_grupos_musica = ' . $group->id . ' and convocatoria = 2016 ')->first();
        if (is_null($call)) {

            $music = Auth::user()->musics()->first();
            $callAnt = Call::whereRaw('id_grupos_musica = ' . $music->id . ' and convocatoria != 2016 ')->first();
            if (is_null($callAnt)) {
                Call::create([
                    'inscripcion_inicial' => '2016',
                    'convocatoria' => '2016',
                    'fecha_registro' => new Carbon(),
                    'id_grupos_musica' => $group->id
                ]);
            } else {
                Call::create([
                    'inscripcion_inicial' => $callAnt->inscripcion_inicial,
                    'convocatoria' => '2016',
                    'fecha_registro' => new Carbon(),
                    'id_grupos_musica' => $group->id,
                ]);
            }
        }
    }

    /*
     * Guarda los datos del primer paso
     * */
    private function saveStepOne($request, $group)
    {
        $data = $request->all();
        if ($request->hasFile('photoGroup')) {
            $imageName = str_random(40) . '**' . $request->file('photoGroup')->getClientOriginalName();
            $request->file('photoGroup')->move(base_path() . '/public/uploads/photoGroups/', $imageName);
            $data['image'] = $imageName;
        }
        $next = $data['submit'];
        unset($data['submit'], $data['photoGroup'], $data['pdfArtist']);
        $group->fill($data);
        Auth::user()->group()->save($group);
        if ($next == 'CONTINUAR')
            return $this->continueStepToTwo($data);
        return 'back';
    }

    private function continueStepToTwo($data)
    {
        $this->validator = Validator::make($data, [
            'name' => 'required',

            'short_review' => 'required|max:700',
            'type_proposal' => 'required',
            'genre' => 'required',
            'pdf' => 'required',
            'manager' => 'required',
            'show_cost' => 'required',
            'showcases' => 'required',

        ],[
            'name.required'=> 'El campo nombre es requerido',
            'short_review.required'=> 'El campo reseña es requerido',
            'type_proposal.required'=> 'El campo tipo de propuesta es requerido',
            'genre.required'=> 'El campo genero es requerido',
            'pdf.required'=> 'El campo pdf es requerido',
            'manager.required'=> 'El campo Manager o representante es requerido',
            'show_cost.required'=> 'El campo ¿Cuánto cuesta tu show en vivo? es requerido',
            'showcases.required'=> 'El campo Indica si quieres que tu propuesta sea evaluada para participar en los showcases es requerido',

        ]);
        if (!$this->validator->fails()) {
            $call = Auth::user()->group()->first()->call()->first();
            $call->step = ($call->step > 1) ? $call->step : 1 ;
            $call->save();
            return 'next';
        } else {
            return 'error';
        }
    }

    public function stepTwo()
    {
        $countries = Country::orderBy('nombre')->get();
        $step = 2;

        $r = Auth::user()->representative()->first();
        if (!$r && Session::get('antique')) {
            $r = Auth::user()->group()->select('id')->first()->related()->first()->normalizeData();
        }
        return view('step2', compact('countries', 'step', 'r'));
    }

    public function stepTwoPost(Request $request)
    {

        $data = $request->all();
        if ($request->hasFile('imageRepresentative')) {
            $imageName = str_random(40) . '**' . $request->file('imageRepresentative')->getClientOriginalName();
            $request->file('imageRepresentative')->move(base_path() . '/public/uploads/photoRepresentative/', $imageName);
            $data['image_representative'] = $imageName;
        }
        $next = $data['submit'];
        unset($data['submit'], $data['imageRepresentative']);

        $representative = Representative::firstOrNew(['user_id' => Auth::user()->id]);
        $representative->fill($data);
        $representative->save();

        if ($next == 'CONTINUAR')
            return $this->continueStepToThree($data);
        return back();

    }
    private function continueStepToThree($data)
    {
        $validator = Validator::make($data, [
            'name_representative' => 'required',
            'last_name_representative' => 'required',
            'identification_representative' => 'required',
            'identification_number_representative' => 'required',
            'gender_representative' => 'required',
            'day_representative' => 'required',
            'month_representative' => 'required',
            'year_representative' => 'required',
            'country_representative' => 'required',
            'state_representative' => 'required',
            'city_representative' => 'required',
            'address_Representative' => 'required',
            'phone_Representative' => 'required',
            'email_representative' => 'required|email',
            'email_alternative_representative' => 'required|email',
            'sms_authorize' => 'required',
            'level_education_representative' => 'required',
            'is_company' => 'required',


        ],[
            'name_representative.required'=> 'El campo Nombre(s) de la persona que va en representación es requerido',
            'last_name_representative.required'=> 'El campo Apellido(s) es requerido',
            'identification_representative.required'=> 'El campo Tipo de documento de identificación es requerido',
            'identification_number_representative.required'=> 'El campo Número de identificación es requerido',
            'gender_representative.required'=> 'El campo Género es requerido',
            'day_representative.required'=> 'El campo Selecciona el día es requerido',
            'month_representative.required'=> 'El campo Selecciona el mes es requerido',
            'year_representative.required'=> 'El campo Selecciona el año es requerido',
            'country_representative.required'=> 'El campo País es requerido',
            'state_representative.required'=> 'El campo Departamento es requerido',
            'city_representative.required'=> 'El campo Ciudad requerido',
            'address_Representative.required'=> 'El campo Dirección es requerido',
            'phone_Representative.required'=> 'El campo Teléfono fijo es requerido',
            'email_representative.required'=> 'El campo Correo electrónico es requerido',
            'email_representative.email'=> 'El campo correo electronico es invalido',
            'email_alternative_representative.required'=> 'El campo Correo alternativo es requerido',
            'email_alternative_representative.email'=> 'El campo correo electronico alternativo es invalido',
            'sms_authorize.required'=> 'El campo ¿Autorizas el envío de mensajes de texto a tu celular? es requerido',
            'level_education_representative.required'=> 'El campo Nivel de estudios es requerido',
            'is_company.required'=> 'El campo ¿Vienes en representación de una empresa? es requerido',



        ]);
        if (!$validator->fails()) {
            $call = Auth::user()->group()->first()->call()->first();
            $call->step = ($call->step > 2) ?$call->step : 2 ;
            $call->save();
            return redirect()->route('stepThree');
        } else {
            return back()->withErrors($validator);
        }
    }

    public function stepThree()
    {
        $step = 3;
        $group = $this->getGroup();
        return view('step3', compact('step','group'));
    }
    public function stepThreePost(Request $request)
    {
        $data = $request->all();
        $group = $this->getGroup();
        $next = $data['submit'];
        unset($data['submit']);
        $group->fill($data);
        $group->save();
        if ($next == 'CONTINUAR')
            return $this->continueStepToFour();
        return back();

        return view('step3', compact('step','group'));
    }
    private function continueStepToFour()
    {
        //Por validar y si esta ok actualiza y va al paso 4
        if (true) {
            $call = Auth::user()->group()->first()->call()->first();
            $call->step = ($call->step > 3) ?$call->step : 3 ;
            $call->save();
            return redirect()->route('stepFour');
        } else {
            return back()->withErrors('');
        }
    }

    public function stepFour()
    {
        $step = 4;
        $group = $this->getGroup();
        return view('step4', compact('step','group'));
    }
    public function stepFourPost(Request $request)
    {
        $data = $request->all();
        $group = $this->getGroup();
        $next = $data['submit'];
        unset($data['submit']);
        $group->fill($data);
        $group->save();
        if ($next == 'CONTINUAR')
            return $this->continueStepToFinish();
        return back();

        return view('step4', compact('step','group'));
    }
    private function continueStepToFinish()
    {
        //Por validar y si esta ok actualiza y va al paso final
        if (true) {
            $call = Auth::user()->group()->first()->call()->first();
            $call->step = ($call->step > 4) ?$call->step : 4 ;
            $call->save();
            return redirect()->route('stepsFinish');
        } else {
            return back()->withErrors('');
        }
    }


    public function stepsFinish()
    {
        $step = 4;
        return view('stepsFinish',compact('step'));
    }


}
