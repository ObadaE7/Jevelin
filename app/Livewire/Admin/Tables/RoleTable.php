<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Role;
use Livewire\{Component, WithPagination};
use App\Traits\{FilterTrait, ModalTrait};
use Exception;
use Illuminate\Support\Facades\Log;

class RoleTable extends Component
{
    use WithPagination, FilterTrait, ModalTrait;

    public $rowId;
    public $name;
    public $description;

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|max:25|unique:roles,name,',
            'description' => 'required|string',
        ]);

        try {
            Role::create($validated);
            session()->flash('success', trans('alerts.role.Created'));
            $this->resetFields();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createRole]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.role.Failed create'));
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->rowId = $role->id;
        $this->name = $role->name;
        $this->description = $role->description;
    }

    public function update($id)
    {
        $role = Role::findOrFail($id);
        $validated =   $this->validate([
            'name' => 'required|string|max:25|unique:roles,name,' . $role->id,
            'description' => 'required|string',
        ]);

        try {
            $role->update($validated);
            session()->flash('success', trans('alerts.role.Updated'));
            $this->resetFields();
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateRole]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.role.Failed update'));
        }
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        try {
            if ($role) {
                $role->delete();
                session()->flash('success', trans('alerts.role.Deleted'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('alerts.role.Not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteRole]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.role.Failed delete'));
        }
    }

    public function resetFields()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function resetFilters()
    {
        $this->resetFields();
        $this->dispatch('urlReset', route('admin.roles'));
    }

    public function render()
    {
        $columns = ['id', 'name', 'description'];
        $headers = [trans('dashboard.table.Id'), trans('dashboard.table.Name'), trans('dashboard.table.Description'), trans('dashboard.table.Actions')];
        $perPages = [5, 10, 20, 50];
        $rows = Role::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.roles.role-table', compact('headers', 'columns', 'rows', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
