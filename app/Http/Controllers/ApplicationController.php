<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->has("search")){
            $applications = Application::where("name", "LIKE", "%" . $request->search . "%")->paginate(8);
        }else{
            $applications = Application::latest()->paginate(8);
        }

        $groups = Group::latest()->get();
        return view("dashboard.application", compact("applications", "groups"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "description" => "required",
            "icon" => "required|image|file|max:1024",
            "link" => "required|url",
            "group_id" => "required"
        ]);

        $validateData["icon"] = $request->file("icon")->store("application-icons");
        $validateData["id"] = Str::uuid();

        Application::create($validateData);

        return redirect()->back()->with(["flash" => [
            "status" => "success",
            "message" => "Data Berhasil Ditambahkan"
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $validateData = $request->validate([
            "name" => "required",
            "description" => "required",
            "icon" => "image|file|max:1024",
            "link" => "required|url",
            "group_id" => "required"
        ]);

        if($request->file("icon")){
            Storage::delete($application->icon);
            $validateData["icon"] = $request->file("icon")->store("application-icons");
        }

        $application->update($validateData);

        return redirect()->back()->with(["flash" => [
            "status" => "success",
            "message" => "Data Berhasil Diupdate"
        ]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        Storage::delete($application->icon);
        $application->delete();
        return redirect()->back()->with(["flash" => [
            "status" => "success",
            "message" => "Data Berhasil Dihapus"
        ]]);        
    }
}
