<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\CategoryWork;

class CategoriesWorkController extends Controller
{
    
    public function index(){
        
        $categoriesWork = CategoryWork::orderBy('id','Desc')->paginate(20);
        return view('dashboard.works.categoriesWork.index')
        ->with('categoriesWork',$categoriesWork);
    }
    
    public function store(Request $request){
       
        $catego_input        = $request->input('categoryWork_name');
        $catego_array        = explode(",", $catego_input);
        
        $catego_array_val    = [];
        
        //valido cada tecnología nueva RECIVIDA EN EL REQUEST
        foreach($catego_array as $catego){
            Validator::make(['categoryWork_name' => $catego],
                ['categoryWork_name' => ['required','min:1','unique:categoriesWork']],
                ['required' => "Verifica las nuevas Categorías, No debe haber ',' al final ni dos ',' juntas. "])
                ->validate();
                //Genero array de elementos a insertar
                array_push($catego_array_val,['categoryWork_name' => $catego]);
        }
        
        CategoryWork::insert( $catego_array_val );
        
        flash('Tecnologías nuevas creadas con exito')->success();
        return redirect()->route('categoriesWork.index');
    }
    
    public function update(Request $request,$id){
       
        $catego = CategoryWork::find($id);
        
        //dd($request->input('categoryWork_name'));
        
        $validator = Validator::make(['categoryWork_name' => $request->input('categoryWork_name')],
            ['categoryWork_name' => ['required','min:2','unique:categoriesWork']],
            ['required' => "Verifica las nuevas Tecnologías, No debe haber ',' al final ni dos ',' juntas. "])
            ;//->validate();
            
            if($validator->fails()){
                $categoriesWork = CategoryWork::orderBy('id','ASC')->paginate(20);
                
                
                dd($validator);
                return view('dashboard.works.categoriesWork.index')
                ->with(['categoriesWork'=>$categoriesWork, 'id' => $id,'old_val_input'=>$request->input('categoryWork_name')])
                ->withErrors($validator)
                ->withInput($request->input('categoryWork_name'));
            }
            
            $catego->fill($request->all());
            $catego->save();
            
            flash('Campo Modificado con exito.')->success();
            return redirect()->route('categoriesWork.index');
    }
    
    //Eliminar tecnología
    public function destroy($id){
        $catego = CategoryWork::find($id);
        $catego->delete();
        
        flash('La categoría fue eliminada con exito')->success();
        return redirect()->route('categoriesWork.index');
    }
}
