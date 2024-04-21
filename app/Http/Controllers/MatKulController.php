<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatKulController extends Controller
{
    public function index(){
        $matkul = Matkul::get();

        return view('matkul.index', compact('matkul'));
    }

    public function create(){
        return view('matkul.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'idcourse'   => 'required|int|unique:course',
            'codecourse' => 'required|string|unique:course',
            'namacourse' => 'required|string',
            'sks'        => 'required|int'
        ])->validate();

        $matkul['idCourse']   = $request->idcourse;
        $matkul['codeCourse'] = $request->codecourse;
        $matkul['nameCourse'] = $request->namacourse;
        $matkul['sks']        = $request->sks;
        $matkul['statusCourse'] = 'open';

        MatKul::create($matkul);

        return redirect()->route('mat-index');
    }

    public function edit(Request $request, $id){
        $matkul = MatKul::find($id);
        
        return view('matkul.edit', compact('matkul'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'codecourse'    => 'required|string',
            'namacourse'    => 'required|string',
            'sks'           => 'required|int',
            'statuscourse'  => 'required|string'
        ])->validate();
    
        $matkul = MatKul::find($id);
    
        $matkul->codeCourse     = $request->codecourse;
        $matkul->nameCourse     = $request->namacourse;
        $matkul->sks            = $request->sks;
        $matkul->statusCourse   = $request->statuscourse;
    
        $matkul->save();
    
        return redirect()->route('mat-index');
    }

    public function delete(Request $request,$id)
    {
        $matkul = MatKul::find($id);

        if ($matkul){
            $matkul->delete();
        }

        return redirect()->route('mat-index');
    }
}
