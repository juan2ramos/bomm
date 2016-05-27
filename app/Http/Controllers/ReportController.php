<?php

namespace Bomm\Http\Controllers;

use Bomm\Entities\Call;
use Bomm\Entities\Group;
use Bomm\User;
use Illuminate\Http\Request;

use Bomm\Http\Requests;
use Jenssegers\Date\Date;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function users()
    {
        $step = '';

        $groups = Group::whereHas('call', function ($query) {
            $query->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
        })->with(['call' => function ($q) {
            $q->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
        }])->orderBy('id', 'desc')->get();

        $registers = Group::where('id', '>', '31')->count();
        $finish = Call::whereRaw('convocatoria = 2016 and fecha_finalizacion IS NOT NULL and id_grupos_musica > 31')->count();
        $thirteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and id_grupos_musica > 31 ')->count();
        $fourteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and id_grupos_musica > 31 ')->count();
        $fifteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and id_grupos_musica > 31 ')->count();
        $sixteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and id_grupos_musica > 31 ')->count();

        $thirteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
        $fourteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
        $fifteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
        $sixteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();

        return view('reportUsers', compact('groups', 'step', 'registers', 'finish',
            'thirteen', 'fourteen', 'fifteen', 'sixteen', 'thirteenFinish', 'fourteenFinish', 'fifteenFinish', 'sixteenFinish'));
    }

    public function usersExcel()
    {
        $date = Date::now()->format('l j F H:i:s');
        Excel::create('reporte ' . $date, function ($excel) {
            $groups = Group::whereHas('call', function ($query) {
                $query->whereRaw('convocatoria = 2016');
            })->where('id', '>', '31')->with('call')->get();

            $excel->sheet('reporte', function ($sheet) use ($groups) {
                $sheet->setCellValue('A2', 'Año');
                $sheet->setCellValue('B2', 'Inscritos');
                $sheet->setCellValue('C2', 'Finalizados');
                $sheet->setCellValue('E2', 'Inscritos');
                $sheet->setCellValue('E3', 'Inscritos finalizados');

                $sheet->setCellValue('A3', '2013');
                $sheet->setCellValue('A4', '2014');
                $sheet->setCellValue('A5', '2014');
                $sheet->setCellValue('A6', '2016');


                $registers = Group::where('id', '>', '31')->count();
                $finish = Call::whereRaw('convocatoria = 2016 and fecha_finalizacion IS NOT NULL and id_grupos_musica > 31')->count();
                $thirteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and id_grupos_musica > 31 ')->count();
                $fourteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and id_grupos_musica > 31 ')->count();
                $fifteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and id_grupos_musica > 31 ')->count();
                $sixteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and id_grupos_musica > 31 ')->count();

                $thirteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $fourteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $fifteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $sixteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();


                $sheet->setCellValue('B3', $thirteen);
                $sheet->setCellValue('B4', $fourteen);
                $sheet->setCellValue('B5', $fifteen);
                $sheet->setCellValue('B6', $sixteen);

                $sheet->setCellValue('C3', $thirteenFinish);
                $sheet->setCellValue('C4', $fourteenFinish);
                $sheet->setCellValue('C5', $fifteenFinish);
                $sheet->setCellValue('C6', $sixteenFinish);

                $sheet->setCellValue('F2', $registers);
                $sheet->setCellValue('F3', $finish);


                $groups = Group::whereHas('call', function ($query) {
                    $query->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
                })->with(['call' => function ($q) {
                    $q->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
                }])->orderBy('id', 'desc')->get();

                $i = 9;
                $sheet->appendRow(8,
                    ['id', 'Nombre', 'Año inscripción', 'Fecha de inscripción', 'Fecha de Finalizacion', 'Formulario'
                    ]);
                foreach ($groups as $group) {
                    $sheet->appendRow($i,
                        [$group->id, $group->name, $group->call->inscripcion_inicial
                            , $group->date_human, $group->call->date_human, $group->call->step
                        ]);
                    $i++;
                }


            });
        })->export('xls');

        $step = '';

        $groups = Group::whereHas('call', function ($query) {
            $query->whereRaw('convocatoria = 2016');

        })->where('id', '>', '31    ')->with('call')->get();

        $registers = Group::where('id', '>', '31')->count();
        $finish = Call::whereRaw('convocatoria = 2016 and fecha_finalizacion IS NOT NULL ')->count();
        $thirteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 ')->count();
        $fourteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 ')->count();
        $fifteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 ')->count();
        $sixteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 ')->count();

        $thirteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and fecha_finalizacion IS NOT NULL')->count();
        $fourteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and fecha_finalizacion IS NOT NULL')->count();
        $fifteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and fecha_finalizacion IS NOT NULL')->count();
        $sixteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and fecha_finalizacion IS NOT NULL')->count();

        return view('reportUsers', compact('groups', 'step', 'registers', 'finish',
            'thirteen', 'fourteen', 'fifteen', 'sixteen', 'thirteenFinish', 'fourteenFinish', 'fifteenFinish', 'sixteenFinish'));
    }

    public function user($id)
    {
        $step = '';
        $group = Group::find($id);
        $representative = $group->user->representative;
        $call = Call::whereRaw('id_grupos_musica = ' . $group->id . ' and convocatoria = 2016 ')->first();
        return view('reportUser', compact('group', 'step', 'representative', 'call'));
    }
    public function changePassword(Request $request){
        $id = $request->input('idUser');
        $user = User::find($id);
        $user->password = bcrypt($request->input('password'));
;
        $user->save();
        return back()->with('success');
    }
}
