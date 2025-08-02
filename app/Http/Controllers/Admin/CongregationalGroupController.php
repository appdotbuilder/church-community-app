<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCongregationalGroupRequest;
use App\Http\Requests\UpdateCongregationalGroupRequest;
use App\Models\CongregationalGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CongregationalGroupController extends Controller
{
    /**
     * Check if user has admin access.
     */
    protected function checkAdminAccess()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Access denied. Admin privileges required.');
        }
        return null;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        $groups = CongregationalGroup::latest()->paginate(10);
        
        return Inertia::render('admin/congregational-groups/index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        return Inertia::render('admin/congregational-groups/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCongregationalGroupRequest $request)
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        CongregationalGroup::create($request->validated());

        return redirect()->route('admin.congregational-groups.index')
            ->with('success', 'Congregational group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CongregationalGroup $congregationalGroup)
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        return Inertia::render('admin/congregational-groups/show', [
            'group' => $congregationalGroup
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CongregationalGroup $congregationalGroup)
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        return Inertia::render('admin/congregational-groups/edit', [
            'group' => $congregationalGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCongregationalGroupRequest $request, CongregationalGroup $congregationalGroup)
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        $congregationalGroup->update($request->validated());

        return redirect()->route('admin.congregational-groups.show', $congregationalGroup)
            ->with('success', 'Congregational group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CongregationalGroup $congregationalGroup)
    {
        if ($redirect = $this->checkAdminAccess()) {
            return $redirect;
        }

        $congregationalGroup->delete();

        return redirect()->route('admin.congregational-groups.index')
            ->with('success', 'Congregational group deleted successfully.');
    }
}