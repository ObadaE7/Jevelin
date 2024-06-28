<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Post;
use Livewire\{Component, WithPagination};
use App\Traits\{FilterTrait, ModalTrait};
use Illuminate\Support\Facades\Log;
use Exception;

class PostTable extends Component
{
    use WithPagination, FilterTrait, ModalTrait;

    public $rowId;
    public $name;
    public $description;

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        try {
            if ($post) {
                $post->delete();
                session()->flash('success', trans('alerts.post.Deleted'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('alerts.post.Not found'));
            }
        } catch (Exception $e) {
            Log::error('[deletePost]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.post.Failed delete'));
        }
    }

    protected function makeSlug($string, $separator = '-')
    {
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace('/\s+/', $separator, $string);
        $string = preg_replace('/[^\p{L}\p{N}]+/u', $separator, $string);
        $string = preg_replace('/' . preg_quote($separator) . '+/', $separator, $string);
        $string = trim($string, $separator);
        return $string;
    }

    public function resetFields()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function resetFilters()
    {
        $this->resetFields();
        $this->dispatch('urlReset', route('admin.posts'));
    }

    public function render()
    {
        $columns = ['image', 'title', 'subtitle'];
        $headers = [trans('dashboard.table.Image'),  trans('dashboard.table.Title'), trans('dashboard.table.Category'), trans('dashboard.table.Status'), trans('dashboard.table.Actions')];
        $perPages = [5, 10, 20, 50];
        $rows = Post::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.posts.post-table', compact('headers', 'columns', 'rows', 'perPages'))
            ->extends('layouts.dashboard')->section('content');
    }
}
