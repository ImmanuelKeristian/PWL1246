<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use App\Models\Matkul;
use App\Models\User;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index(){
        $akun = User::get();
        $pols = Polls::get();
        $courses = Matkul::get();
        $forms = Form::get();

        return view('forum.index', compact('akun','pols', 'courses'));
    }

    public function create($id){
        $pols = Polls::find($id);
        $courses = Matkul::all();
        
        return view('forum.create', compact('pols','courses'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'idpollingHasil'=> 'int',
            'idcourse'      => 'required|array', 
            'idcourse.*'    => 'exists:course,idCourse',
            ])->validate();

        $maxSKS = 9;

        $totalSKS = 0;
        if ($request->has('idcourse')) {
            foreach ($request->idcourse as $courseId) {
                $course = Matkul::find($courseId);
                if ($course) {
                    $totalSKS += $course->sks;
                }
            }
        }

        if ($totalSKS > $maxSKS) {
            return back()->withErrors(['idcourse' => 'Total SKS exceeds the maximum allowed ('.$maxSKS.').']);
        }
        
        $poll = Polls::find('idpollingHasil');

        if ($poll) {
            $poll->totalPolling += 1;
            $poll->save();
        }

        $user = Auth::user();

        $lastIdcourseSelection = Form::max('idcourseSelection') ?? 0;

        foreach ($request->idcourse as $courseId) {
            $form = new Form();
            $form->idcourseSelection = $lastIdcourseSelection + 1;
            $form->idCourse = $courseId;
            $form->idUser = $user->id;
    
            $poll->forms()->save($form);
        }
    
        return redirect()->route('for-index');
    }
}