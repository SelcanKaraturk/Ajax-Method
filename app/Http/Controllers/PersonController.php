<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request )
    {
        if ($request->filled('cinsiyet')){
            if ($request->get('cinsiyet') === 'all'){
                $person= Person::all();
            }else{
                $sec= $request->get('cinsiyet');
                $person = Person::all()->where('cinsiyet',$sec);
            }
        }else{
            $person= Person::all();
        }
        return view('kisiler',compact('person'));
    }

    public function table(Request $request )
    {
        $person = Person::all();
        if ($request->filled('sec')){
            if ($request->get('data')!=='all'){
                $sec= $request->get('data');
                $person = Person::all()->where('cinsiyet',$sec);
               return $person;
            }
            return $person;
        }
        if ($request->filled('edit')){
            $editPerson= $request->get('data');
            $editPerson = Person::find($editPerson);
            return response()->json($editPerson);
        }
        return view('kisiler2',compact('person'));
    }

    public function addPerson(Request $request)
    {
        $editValue = $request->formdata;
        $update= Person::find($request->id);
        $updated=$update->update($editValue);
        if ($updated){
            $data = Person::all();
            return response()->json([
                'status'=>'Başarıyla Güncellendi',
                'type' => 'success',
                'data' =>$data
            ]);
        }
        else{
            return response()->json([
                'status'=>'Beklenmeyen bir hata oluştu',
                'type' => 'danger'
            ]);
        }

    }
}
