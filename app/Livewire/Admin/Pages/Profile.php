<?php

namespace App\Livewire\Admin\Pages;

use App\Models\{Admin, Country, Role};
use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Storage, Hash, Log};
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Exception;

class Profile extends Component
{
    use WithFileUploads;

    public $cover;
    public $avatar;
    public $uname;
    public $fname;
    public $lname;
    public $bio;
    public $phone;
    public $birthday;
    public $email;
    public $password;
    public $current_password;
    public $current_password_email;
    public $current_password_account;
    public $password_confirmation;
    public $roles;
    public $countries;
    public $role_id;
    public $country_id;

    public function mount()
    {
        $user = auth()->user();
        $this->uname = $user->uname;
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->bio = $user->bio;
        $this->phone = $user->phone;
        $this->birthday = $user->birthday;
        $this->email = $user->email;
        $this->countries = Country::all();
        $this->roles = Role::all();
        $this->country_id = $user->country_id ?? null;
        $this->role_id = $user->role_id ?? null;
    }

    public function updatedFname()
    {
        $id = auth()->user()->id;
        $this->validateOnly('fname', ['fname' => 'required|string']);

        try {
            Admin::findOrFail($id)->update(['fname' => $this->fname]);
            session()->flash('fname', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'fname');
        } catch (Exception $e) {
            Log::error('[updatedFname]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update fname'));
        }
    }

    public function updatedLname()
    {
        $id = auth()->user()->id;
        $this->validateOnly('lname', ['lname' => 'required|string']);
        try {
            Admin::findOrFail($id)->update(['lname' => $this->lname]);
            session()->flash('lname', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'lname');
        } catch (Exception $e) {
            Log::error('[updatedLname]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update lname'));
        }
    }

    public function updatedUname()
    {
        $id = auth()->user()->id;
        $this->validateOnly('uname', ['uname' => 'required|size:8|string|unique:users,uname|unique:admins,uname,' . $id],);
        try {
            Admin::findOrFail($id)->update(['uname' => $this->uname]);
            session()->flash('uname', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'uname');
        } catch (Exception $e) {
            Log::error('[updatedUname]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update username'));
        }
    }

    public function updatedCountryId()
    {
        $id = auth()->user()->id;
        $this->validateOnly('country_id', ['country_id' => 'required|numeric|exists:countries,id'],);
        try {
            Admin::findOrFail($id)->update(['country_id' => $this->country_id]);
            session()->flash('country_id', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'country_id');
        } catch (Exception $e) {
            Log::error('[updatedCountryId]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update country'));
        }
    }

    public function updatedRoleId()
    {
        $id = auth()->user()->id;
        $this->validateOnly('role_id', ['role_id' => 'required|numeric|exists:roles,id'],);
        try {
            Admin::findOrFail($id)->update(['role_id' => $this->role_id]);
            session()->flash('role_id', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'role_id');
        } catch (Exception $e) {
            Log::error('[updatedRoleId]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update role'));
        }
    }

    public function updatedBio()
    {
        $id = auth()->user()->id;
        $this->validateOnly('bio', ['bio' => 'nullable|sometimes|min:10|string|max:500']);
        try {
            Admin::findOrFail($id)->update(['bio' => $this->bio]);
            session()->flash('bio', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'bio');
        } catch (Exception $e) {
            Log::error('[updatedBio]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update bio'));
        }
    }

    public function updatedPhone()
    {
        $id = auth()->user()->id;
        $this->validateOnly('phone', ['phone' => 'nullable|sometimes|numeric|digits:10|unique:users,phone|unique:admins,phone,' . $id]);
        try {
            Admin::findOrFail($id)->update(['phone' => $this->phone]);
            session()->flash('phone', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'phone');
        } catch (Exception $e) {
            Log::error('[updatedPhone]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update phone'));
        }
    }

    public function updatedBirthday()
    {
        $id = auth()->user()->id;
        $this->validateOnly('birthday', ['birthday' => 'nullable|sometimes|date']);
        try {
            Admin::findOrFail($id)->update(['birthday' => $this->birthday]);
            session()->flash('birthday', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'birthday');
        } catch (Exception $e) {
            Log::error('[updatedBirthday]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update birthday'));
        }
    }

    public function saveEmail()
    {
        $id = auth()->user()->id;
        $this->validate([
            'email' => 'required|string|email|unique:users,email|unique:admins,email,' . $id,
            'current_password_email' => 'required|string|current_password:admin'
        ]);

        try {
            Admin::findOrFail($id)->update(['email' => $this->email]);
            session()->flash('email', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'email');
            $this->reset(['current_password_email']);
        } catch (Exception $e) {
            Log::error('[saveEmail]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update email'));
        }
    }

    public function savePassword()
    {
        $user = auth()->user();
        $validated = $this->validate(
            [
                'current_password' => 'required|string|current_password:admin',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'password_confirmation' => 'required',
            ],
        );

        try {
            if (Hash::check($this->current_password, $user->password)) {
                Admin::findOrFail($user->id)->update(['password' => Hash::make($validated['password'])]);
            }
            session()->flash('password', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'password');
            $this->reset(['current_password', 'password', 'password_confirmation']);
        } catch (Exception $e) {
            Log::error('[savePassword]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update password'));
        }
    }

    public function updatedCover()
    {
        $user = auth()->user();
        $validated = $this->validateOnly('cover', ['cover' => 'required|file|image|mimes:jpg,jpeg,png|max:1024']);

        try {
            if ($user->cover) {
                Storage::disk('public')->delete($user->cover);
            }
            $cover = $validated['cover']->store('covers', 'public');
            Admin::findOrFail($user->id)->update(['cover' => $cover]);
            session()->flash('cover', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', ['field' => 'cover']);
        } catch (Exception $e) {
            Log::error('[updatedCover]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update cover'));
        }
    }

    public function updatedAvatar()
    {
        $user = auth()->user();
        $validated =  $this->validateOnly('avatar', ['avatar' => 'required|file|image|mimes:jpg,jpeg,png|max:1024']);

        try {
            $avatar = $validated['avatar']->store('avatars', 'public');
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            Admin::findOrFail($user->id)->update(['avatar' => $avatar]);
            session()->flash('avatar', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'avatar');
        } catch (Exception $e) {
            Log::error('[updatedAvatar]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed update avatar'));
        }
    }

    public function deleteAccount()
    {
        $user =  Admin::findOrFail(auth()->id());
        $this->validate([
            'current_password_account' => 'required|string|current_password:admin'
        ]);

        try {
            if (Hash::check($this->current_password_account, $user->password)) {
                Auth::guard('admin')->logout();
                session()->invalidate();
                session()->regenerateToken();
                $user->delete();
                session()->flash('success', trans('alerts.profile.Deleted'));
                return to_route('admin.login');
            }
        } catch (Exception $e) {
            Log::error('[deleteAccount]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed delete account'));
        }
    }

    public function resetFields()
    {
        $this->reset(['current_password_account']);
        $this->resetValidation();
    }

    public function resetSuccessMessage($field)
    {
        $this->resetErrorBag($field);
    }

    public function render()
    {
        return view('admin.pages.profile')->extends('layouts.dashboard')->section('content');
    }
}
