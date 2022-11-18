<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\Membership;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Group::get();
        return view('Groups.index')->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_id'=>'required',
        ]);
        DB::beginTransaction();

        try {
        $group=Group::create([
            'name'=>$request->name,
        ]);
        $membership=Membership::create([
            'user_id'=>$request->user_id,
            'group_id'=>$group->id,
            'join_date'=>Carbon::now()->setTimezone("GMT+3"),
            'group_role'=>'admin',
        ]);
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        // something went wrong
    }
        return redirect('groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {

        return view('Groups.edit',['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $group->name = $request->name;
        $group->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->destroy($group->id);
        return redirect()->back();
    }
}
