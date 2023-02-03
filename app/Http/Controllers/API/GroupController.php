<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function single(Group $group){
        
        return response()->json([
            "message" => "Fetch Data Successfuly",
            "data" => $group
        ]);
    }
}
