<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Country;
use Livewire\{Component, WithPagination};
use App\Traits\{FilterTrait, ModalTrait};
use Illuminate\Support\Facades\{Storage, Log};
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Exception;

class CountryTable extends Component
{
    use WithPagination, WithFileUploads, FilterTrait, ModalTrait;

    public $rowId;
    public $name;
    public $flag;
    public $existingFlag;

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:countries,name,',
            'flag' => 'required|file|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        try {
            $validated['flag'] = $validated['flag']->store('flags', 'public');
            Country::create($validated);
            session()->flash('success', trans('alerts.country.Created'));
            $this->resetFields();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createCountry]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.country.Failed create'));
        }
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        $this->rowId = $country->id;
        $this->name = $country->name;
        $this->existingFlag = $country->flag;
    }

    public function update($id)
    {
        $country = Country::findOrFail($id);
        $validated =   $this->validate([
            'name' => 'required|string|max:25|unique:countries,name,' . $country->id,
            'flag' => 'nullable|sometimes|file|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        try {
            if (isset($validated['flag'])) {
                if ($country->flag) {
                    Storage::disk('public')->delete($country->flag);
                }
                $validated['flag'] = $validated['flag']->store('flags', 'public');
            } else {
                $validated['flag'] = $this->existingFlag;
            }

            $country->update($validated);
            session()->flash('success', trans('alerts.country.Updated'));
            $this->resetFields();
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateCountry]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.country.Failed update'));
        }
    }

    public function delete($id)
    {
        $country = Country::findOrFail($id);
        try {
            if ($country) {
                $country->delete();
                session()->flash('success', trans('alerts.country.Deleted'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('alerts.country.Not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteCountry]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.country.Failed delete'));
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
        $this->dispatch('urlReset', route('admin.countries'));
    }

    public function render()
    {
        $columns = ['id', 'name', 'flag'];
        $headers = [trans('dashboard.table.Id'), trans('dashboard.table.Flag'), trans('dashboard.table.Name'), trans('dashboard.table.Actions')];
        $perPages = [5, 10, 20, 50];
        $rows = Country::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.countries.country-table', compact('headers', 'columns', 'rows', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
