<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PolController extends Controller
{
    public function index(){
        $pols = Polls::get();
        $courses = Matkul::get();

        return view('poll.index', compact('pols', 'courses'));
    }

    public function create(){
        $courses = Matkul::all();
        
        return view('poll.create', compact('courses'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'idpollinghasil'=> 'required|int|unique:pollinghasil',
            'idcourse'      => 'required|array', 
            'idcourse.*'    => 'exists:course,idCourse',
            'start'         => 'required|date',
            'end'           => ['required','date',
                    function ($attribute, $value, $fail) use ($request) {
                        $start = $request->start;
                        $end = $request->end;
                        if ($start >= $end) {
                            $fail('Akhir Polling harus setelah Awal Polling');
                        }
                    },
                ],

        ])->validate();

        foreach ($request->idcourse as $courseId) {
            $pols['idpollingHasil'] = $request->idpollinghasil;
            $pols['idCourse']       = $courseId;
            $pols['totalPolling']   = 0;
            $pols['start_poll']     = $request->start;
            $pols['end_poll']       = $request->end;
            $pols['statusPoll']     = 'Open';

            Polls::create($pols);

            return redirect()->route('pol-index');
        }
    }

    public function edit(Request $request, $id){
        $pols = Polls::find($id);
        
        return view('poll.edit', compact('pols'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'statuspoll'    => 'required|string',
        ])->validate();
    
        $pols = Polls::find($id);
    
        $pols->statusPoll   = $request->statuspoll;
    
        $pols->save();
    
        return redirect()->route('pol-index');
    }

    public function delete(Request $request,$id)
    {
        $pols = Polls::find($id);

        if ($pols){
            $pols->delete();
        }

        return redirect()->route('pol-index');
    }
}
