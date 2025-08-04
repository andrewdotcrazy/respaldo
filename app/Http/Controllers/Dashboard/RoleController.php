<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;

use Spatie\Permission\Models\Role as SpatieRole;

class RoleController extends Controller
{
    public function index(){
        $roles = SpatieRole::paginate(2);
        return view('dashboard/roles/index', compact('roles'));
    }

    public function create(){
        $Role = new SpatieRole();
        return view('dashboard.roles.create', compact('Role'));
    }

    public function store(StoreRoleRequest $request)
    {
        SpatieRole::create($request->validated());
        return to_route('roles.index')->with('status','Role created');
    }

    public function show(SpatieRole  $Role)
    {
        return view('dashboard\roles\show', ['Role' => $Role]);
    }

    public function edit(SpatieRole $Role)
    {
        return view('dashbaord.roles.edit',compact('Role'));
    }

    public function update(UpdateRoleRequest $request, SpatieRole $Role)
    {
        $Role->update($request->validated());
        return to_route('roles.index')->with('status','Role updated');
    }

    public function destroy(SpatieRole $Role)
    {
        $Role->delete();
        return to_route('roles.index')->with('status','Role deleted');
    }


}
