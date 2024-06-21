<?php

namespace App\Livewire\Admin\Tables;

use App\Models\User;
use App\Traits\{FilterTrait, ModalTrait};
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\{Component, WithPagination};

class UserTable extends Component
{
    use WithPagination, ModalTrait, FilterTrait;

    public $rowId;
    public $uname;
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $password_confirmation;

    public function create()
    {
        $validated = $this->validate([
            'fname' => 'required|min:5|alpha',
            'lname' => 'required|min:5|alpha',
            'uname' => 'required|size:8|string|unique:users,uname,',
            'email' => 'required|string|email|unique:users,email,',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password_confirmation' => 'required',
        ]);

        try {
            User::create($validated);
            session()->flash('success', trans('alerts.user.Created'));
            $this->resetFields();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createUser]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.user.Failed create'));
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->rowId = $user->id;
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->uname = $user->uname;
        $this->email = $user->email;
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:users,name,' . $user->id,
            'slug' => 'required|string|unique:users,slug,' . $user->id,
        ]);

        try {
            $user->update($validated);
            session()->flash('success', trans('alerts.user.Updated'));
            $this->resetFields();
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateUser]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.user.Failed update'));
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        try {
            if ($user) {
                $user->delete();
                session()->flash('success', trans('alerts.user.Deleted'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('alerts.user.Not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteUser]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.user.Failed delete'));
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
        $this->dispatch('urlReset', route('admin.users'));
    }

    public function render()
    {
        $columns = ['fname', 'lname', 'email'];
        $headers = ['Avatar', 'Name', 'Email', 'Actions'];
        $headers = [trans('dashboard.table.Avatar'), trans('dashboard.table.Name'), trans('dashboard.table.Email'), trans('dashboard.table.Actions')];

        $perPages = [5, 10, 20, 50];
        $rows = User::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.user-table', compact('headers', 'columns', 'rows', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
