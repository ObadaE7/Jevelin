<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Role;
use App\Traits\FilterTrait;
use App\Traits\ModalTrait;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\{Component, WithPagination};

class RoleTable extends Component
{
    use WithPagination, FilterTrait, ModalTrait;

    public $rowId;
    public $name;
    public $description;
    public $columns;
    public $perPages;

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:roles,name,',
            'description' => 'required|string',
        ]);

        try {
            Role::create($validated);
            session()->flash('success', trans('Role created'));
            // $this->resetField();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createRole]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to create role'));
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->rowId = $role->id;
        $this->name = $role->name;
        $this->description = $role->slug;
    }

    public function update($id)
    {
        $role = Role::findOrFail($id);
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:roles,name,' . $role->id,
            'description' => 'required|string',
        ]);

        try {
            $role->update($validated);
            session()->flash('success', trans('The role has been updated successfully'));
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateRole]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to update role'));
        }
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        try {
            if ($tag) {
                $tag->delete();
                session()->flash('success', trans('The tag has been deleted successfully'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('Tag not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteTag]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to delete tag'));
        }
    }



    public function render()
    {
        $this->columns = ['id', 'name', 'description'];
        $headers = ['Id', 'Name', 'Description', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = Role::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.role-table', compact('headers', 'rows',))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
