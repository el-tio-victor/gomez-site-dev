<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Tool;
use App\Models\TechnologyTool;
use App\Rules\UniqueTechToll;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
//use Dotenv\Validator;

class TechnologiesController extends Controller
{
    //mostrar todas las tecnologías y sus herramientas
    public function index(Request $request, $filtering = null){

       //ver tecnología, muestro solo la tec y sus herramientas asociadas 
        if($request->ajax()){
            $tech = Technology::where('id',$filtering)->paginate(25);
            $techs_tool = TechnologyTool::where('id_technology',$filtering)->get();
            
            $tools =[];
            foreach ( $techs_tool as $tech_tool){
                array_push($tools, $tech_tool->tool);
            }
            /*dd( $tools[0]->tool_name );
            //dd( $techs_tool[1]->tool->tool_name);
            exit;
            $tech = Technology::where('id',$filtering);
            $techs = $tech->get();
            $tools = Technology::find($filtering)->technologyTool;*/
            return  View::make('dashboard.works.technologies.partials._tech-wrapper')
            ->with(['techs'=>$tech, 'tools' => $tools,'action'=> 'view'])->render();
            //return $tools[0]->tool_name;
            
        }

        $techs = Technology::orderBy('id','ASC')->paginate(25);
        $tools = Tool::orderBy('id','ASC')->get();


        return view('dashboard.works.technologies.index')
        ->with(['techs'=>$techs, 'tools' => $tools]);
    }
    
    //Guardar nueva tecnología
    public function store(Request  $request){
        
        $techs_input        = $request->input('technology_name');
        $techs_array        = explode(",", $techs_input);
        
        $techs_array_val    = [];
        //valido cada tecnología nueva RECIVIDA EN EL REQUEST
        foreach($techs_array as $tech){
            Validator::make(['technology_name' => $tech],
                ['technology_name' => ['required','min:1',new UniqueTechToll]],
                ['required' => "Verifica las nuevas Tecnologías, No debe haber ',' al final ni dos ',' juntas. "])
                ->validate();
            //Genero array de elementos a insertar
           array_push($techs_array_val,['technology_name' => $tech]);
        }
        
        Technology::insert( $techs_array_val );
        
        flash('Tecnologías nuevas creadas con exito')->success();
        return redirect()->route('techs.index');
    }
    
    //Eliminar tecnología
    public function destroy($id){
        $tech = Technology::find($id);
        $tech->delete();
        
        flash('La tecnología fue eliminada con exito')->success();
        return redirect()->route('techs.index');
    }
    
    public function edit($id){
        $tech = Technology::find($id);
        return $tech;
    }
    
    //Update technology
    public function update(Request $request, $id){
        $tech = Technology::find($id);
        
        $validator = Validator::make(['technology_name' => $request->input('technology_name')],
            ['technology_name' => ['required','min:2','unique:technologies']],
            ['required' => "Verifica las nuevas Tecnologías, No debe haber ',' al final ni dos ',' juntas. "])
            ;//->validate();
        
            if($validator->fails()){
                $techs = Technology::orderBy('id','ASC')->paginate(5);
                $tools = Tool::orderBy('id','ASC')->paginate(5);
                
                
                return view('dashboard.works.technologies.index')
                ->with(['techs'=>$techs, 'tools' => $tools, 'id' => $id,'old_val_input'=>$request->input('technology_name')])
                ->withErrors($validator)
                ->withInput($request->input('technology_name'));
            }
        
        $tech->fill($request->all());
        $tech->save();
        
        flash('Campo Modificado con exito.')->success();
        return redirect()->route('techs.index');
    }
    
    //******************************** Herramientas
    //GUardar nuevas herramientas
    public function storeTool(Request $request){
        $tools_input        = $request->input('tool_name');
        $tools_array        = explode(",", $tools_input);
        
        //Array para insertar a tabla technology_tool
        $technology_tool_rows   = [];
        $tool_errors            = [];
        
        foreach($tools_array as $tool){
            $tool_model         = new Tool;
            
            //valido cada tecnología nueva RECIVIDA EN EL REQUEST
            $validator = Validator::make(['tool_name' => $tool],
                ['tool_name' => ['required','min:2',new UniqueTechToll]],
                ['required' => "Verifica las nuevas Herramientas, No debe haber ',' al final ni dos ',' juntas. "])
            ;
            //si la herramienta actual no cumple con la validación
            if($validator->fails()){
                array_push($tool_errors,$validator->errors());
            }
            else{//Si cumple con la validación
                //Primero inserto la herramienta si es que no existe ya    
                $tool_model->tool_name =$tool;
                $tool_model->save();
                $row = ['id_technology'=> $request->input('id_technology'),'id_tool' => $tool_model->id];
                array_push($technology_tool_rows,$row);
            }
        }
        
        
        //Inserto a la tabla technology_tool 
        TechnologyTool::insert( $technology_tool_rows);
        
        //Si hubo errrores en las herramientas...
        if(count($tool_errors) > 0 ){
            $msgs = '<ul>Ocurrierón los siguientes errores...';
            foreach ($tool_errors as $error){
                foreach ($error->all() as $msg){
                    $msgs .= "<li>$msg</li>";
                }
            }
            $msgs .= "</ul>";
            flash( $msgs )->error();
            return redirect()->route('techs.index');   
        }
        
        //Si todo salió bien...
        flash('Herramientas creadas creadas con exito')->success();
        return redirect()->route('techs.index');
    }
    
    //Eliminar herramienta
    public function destroyTool($id){
        $tool       = Tool::find($id);
        $tech_tool  = TechnologyTool::where('id_tool',$id);
        $tech_tool->delete();
        $tool->delete();
        
        flash('La herramienta fue eliminada con exito')->success();
        return redirect()->route('techs.index');
    }
    
    public function updateTool(Request $request ,$id){
        $tool = Tool::find($id);
        
        $validator = Validator::make(['tool_name' => $request->input('tool_name')],
            ['tool_name' => ['required','min:2']],
            ['required' => "El nombre de la herramienta es requerido. "])
            ;//->validate();
            
            if($validator->fails()){
                $errors = $validator->errors();
                $msgs = "<ol> Ocurrierón los siguientes errores...";
                foreach ($errors->all() as $msg){
                    $msgs .= "<li>$msg</li>";
                }
                $msgs .= "</ol>";
                flash( $msgs )->error();
                return redirect()->route('techs.index'); 
            }
            else{
                $tool->fill($request->all());
                $tool->save();
                flash('La herramienta fue actualizada.' )->success();
                return redirect()->route('techs.index'); 
            }
    }
}
