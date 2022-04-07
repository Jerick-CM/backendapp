<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Roles_Users;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        echo $user_id;

        $user = User::find($user_id);

        $user->roles()->save(new Role(['name' => 'Visitor']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);

        foreach ($user->roles as $role) {

            echo $role->name . '<br/>';
        }
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
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if ($user->has('roles')) {
            foreach ($user->roles as $role) {

                if ($role->name == 'Visitor') {

                    $role->name  = 'Visitor Inspector';

                    $role->save();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $role_id)
    {
        $user = User::find($user_id);

        if ($user->has('roles')) {

            foreach ($user->roles as $role) {

                $role->whereId($role_id)->delete();
            }
        }
    }


    public function detachall($user_id)
    {
        $user = User::find($user_id);
        $user->roles()->detach();
    }

    public function detach($user_id, $role_id)
    {
        $user = User::find($user_id);
        $user->roles()->detach([$role_id]);
        // $user->roles()->detach([$role_id]);
    }

    public function attach($user_id, $role_id)
    {
        $user = User::find($user_id);
        $user->roles()->attach([$role_id]);
    }

    public function attach_array(Request $request)
    {
        $user = User::find(1);
        $user->roles()->attach([1, 5]);
    }

    public function get_roles(Request $request)
    {

        $data = Role::select('id', 'name')->get();

        return response()->json([
            'data' => $data,
            '_benchmark' => microtime(true) -  $this->time_start
        ], 200);
    }

    public function update_role(Request $request, $table_id)
    {

        try {

            $role_user = DB::table('role_user')->where('user_id', $table_id)->update(['role_id' => $request->role_id]);
            $success = 1;

            if ($request->role_id == 1) {
                $user = User::findorfail($table_id);
                $user->is_admin = 1;
                $user->save();
            } else {
                $user = User::findorfail($table_id);
                $user->is_admin = 0;
                $user->save();
            }
        } catch (\Illuminate\Database\QueryException $ex) {

            $success = 0;
        }

        return response()->json([
            'success' => $success,
            'role_user' =>  $role_user,
            'user' => $request->user(),
            '_benchmark' => microtime(true) -  $this->time_start,
        ], 200);
    }
}
