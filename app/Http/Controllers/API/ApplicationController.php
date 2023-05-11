<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Database\Eloquent\Builder;
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
        $application = Application::query();
        $numberPaginate = 6;

        if($request->has("search") && $request->search != ""){
            $application->where("name", "like", '%'. $request->search .'%');
        }

        if($request->has("group") && $request->group != ""){
            $application->whereHas("group", function(Builder $query) use ($request){
                $query->where("name", $request->group);
            });
        }
        return ApplicationResource::collection($application->paginate($numberPaginate));
    }
}
