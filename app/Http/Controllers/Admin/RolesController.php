<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Auth\Access\AuthorizationException;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $this->authorize('view', auth()->user(),new Role);

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $this->authorize('create', $role = new Role);
        $this->authorize('create', auth()->user(),$role = new Role);

        return view('admin.roles.create', [
            'permissions' => Permission::pluck('name','id'),
            'role' => $role
        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create',auth()->user(), new Role);

        $data = $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            // 'guard_name' => 'required'
        ], [
            //si utilitzem laravel lang
            'name.required'=> trans('validation.required_identifier'),
            //'name.unique'=> 'Este Identificador ya ha sido registrado',
            //'display_name.required'=> 'El campo Nombre es obligatorio'
        ]);

        $role = Role::create($data);

        if($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->with('flash', trans('global.rolecreated'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $this->authorize('update',auth()->user(), $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name','id')
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {

        $this->authorize('update',auth()->user(), $role);

        $role->update($request->validated());

        //Esborrem tots els permisos anteriors
        $role->permissions()->detach();

        //Afegim els permisos
        if($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit',$role)->with('flash', trans('global.roleupdated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Role $role)
     {


        $this->authorize('delete',auth()->user(), $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->with('flash', trans('global.roledeleted'));


     }



}
