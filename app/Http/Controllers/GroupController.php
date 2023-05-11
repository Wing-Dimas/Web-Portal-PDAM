<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("search")){
            $groups = Group::where("name", "LIKE", "%" . $request->search . "%")->paginate(8);
        }else{
            $groups = Group::latest()->paginate(8);
        }
        return view("dashboard.group", compact("groups"));
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
        ]);

        $validateData["id"] = Str::uuid();

        // dd($validateData);

        Group::create($validateData);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $validateData = $request->validate([
            "name" => "required",
        ]);

        $group->update($validateData);

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
    public function destroy(Group $group)
    {
        try {
            $group->delete();
            
            return redirect()->back()->with(["flash" => [
                "status" => "success",
                "message" => "Data Berhasil Dihapus"
            ]]);
        } catch (Exception $e) {
            return redirect()->back()->with(["flash" => [
                "status" => "error",
                "message" => "Data Gagal Dihapus, Cek apakah data ini masih digunakan pada aplikasi lain?"
            ]]);
        }
    }
}
