<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UpdateUserRequest;
use App\Providers\UserWasCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$users = User::all();
        $users = User::allowed()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = new User;

        $this->authorize('create', $user);

        //$roles = Role::pluck('name','id');
        $roles = Role::with('permissions')->get();

        $permissions = Permission::pluck('name','id');

        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create', new User);

        //Validamos datos
        $data = $request->validate([
            'name' => ['required', 'regex:/^[A-ZÀÁÇÉÈËÏÍÌÓÒÚÙÜÚÑa-zàáçéèëïíóòúüñ. ]+$/','min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        //Generem la contraseña
        $data['password'] = Str::random(8);


        //Creamos el usuario
        $user = User::create($data);

        //Asignamos roles
        if($request->filled('roles')){
            $user->assignRole($request->roles);
        }

        //Asignamos permisos
        if($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }


        //Enviamos el email
        //Evento => Usuario Creado
        //Listener => Enviar correo con las credenciales
        UserWasCreated::dispatch($user, $data['password']);


        return redirect()->route('admin.users.index')->with('flash',trans('global.usercreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);

        //$roles = Role::pluck('name','id');
        $roles = Role::with('permissions')->get();


        $permissions = Permission::pluck('name','id');

        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $this->authorize('update', $user);

        $old_avatar = $user->avatar;

        $user->update($request->validated());

        //Avatar
        if($request->avatar != null){

            //Delete the old picture
            $photoPath = '/public/avatars/'.$old_avatar;
            Storage::delete($photoPath);

            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            //LocalHost
            $request->avatar->storeAs('/public/avatars',$avatarName);

            //Servidor
            //$path = base_path();
            //Personaldasboard:nom carpeta projecte
            //httpdocs: nom carpeta on posem el directori public servidor
			//$path = str_replace("personaldashboard", "httpdocs", $path);
			//$destinationPath = $path . '/storage/avatars';
            //$request->avatar->move($destinationPath, $avatarName);

            $user->avatar = $avatarName;
            $user->save();

        }

        return redirect()->route('admin.users.edit',$user)->with('flash',trans('global.userupdated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')->with('flash',trans('global.userdeleted'));


    }
}
