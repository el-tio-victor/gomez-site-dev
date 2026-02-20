<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TechnologyTool;

class TechToolController extends Controller
{
    //
    public function list( Request $request){
        $q = $request->q;
        $id_work = $request->id_work;
        
        $techs_tool = TechnologyTool::select("technology_tool.id as id","technologies.technology_name as technology_name","tools.tool_name as tool_name","work_technology.id_work as id_work")
        ->whereRaw('technology_name COLLATE UTF8_GENERAL_CI LIKE ?',["%{$q}%"])
        ->orWhereRaw('tool_name COLLATE UTF8_GENERAL_CI LIKE ?',["%{$q}%"])
        ->leftJoin('technologies','technology_tool.id_technology', '=','technologies.id')
        ->leftJoin('tools','technology_tool.id_tool','=','tools.id')
        ->leftJoin('work_technology','work_technology.id_technology_tool','=','technology_tool.id')
        ->orderBY('technology_name','ASC')
        ->get();
        
        $res =[];
        $ids_tech_tool =[];
        
        foreach ($techs_tool as $tech_tool){
            $selected = false;
            
            
            if(intval($tech_tool->id_work) === intval($id_work) )
                $selected = true;
            
            //Valido que no se agregue dos veces la misma tech-tool por el join con work
            if( !in_array($tech_tool->id, $ids_tech_tool))
            {
                array_push($res,['id'=> $tech_tool->id,'text'=>$tech_tool->technology_name.'/'.$tech_tool->tool_name,'selected'=>$selected]);
                array_push($ids_tech_tool,$tech_tool->id);
            }//Cuando ya esta en el array y selected es true hago la busqueda del elemento y su prop 'selected' la establezco a true
            else if( in_array($tech_tool->id, $ids_tech_tool) && $selected ){
                foreach ($res as &$arr){
                   
                    if( intval($arr['id']) === intval($tech_tool->id) ){
                        
                        $arr['selected'] = $selected;
                        break;
                    }
                }
            }
            
           
        }

        if($q === null)
            return response()->json($res);
        else 
            return response()->json(['results'=>$res]);
        //dd($results);
    }
}
