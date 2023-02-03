<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function single(Application $application){
        
        return response()->json([
            "message" => "Fetch Data Successfuly",
            "data" => $application
        ]);
    }

    public function getData(Request $request){
        $reqData = $request->all();

        $application = DB::table('applications')
            ->select('applications.*', 'groups.name AS group_name')
            ->join('groups', 'applications.group_id', '=', 'groups.id');

        if($reqData["search"] != ""){
            $application = $application->where("applications.name", "LIKE", '%'. $reqData["search"] .'%');
        }
        $application = $application->get();
        if($reqData["group"] != ""){
            $application = $application->where("group_name", "=", $reqData["group"]);
        }
       
        return response()->json([
            "message" => "Fetch Data Successfuly",
            "data" => array_values($application->toArray())
        ]);
    }
}
