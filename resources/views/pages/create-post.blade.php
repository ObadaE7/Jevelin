@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.create.post') }}">{{ trans('string.Articles') }}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Create') }}</a></li>
    </x-breadcrumb>
@endsection

<form>
    <x-alert status="success" color="success" />
    <x-alert status="error" color="danger" />

    <section class="create__post-wrapper">
        <div class="create__post-top">
            <div class="create__post-right">
                <label for="image">
                    @if ($this->image && !$errors->has('image'))
                        <img src="{{ $this->image->temporaryURL() }}" class="rounded rounded-3 p-1"
                            alt="{{ trans('dashboard.Temp image') }}">
                    @endif
                    <div wire:loading.remove class="label__img-text"
                        {{ $this->image && !$errors->has('image') ? 'hidden' : '' }}>
                        <span class="material-icons-outlined fs-1">add_photo_alternate</span>
                        <span>{{ trans('dashboard.post.Image placeholder') }}</span>
                    </div>
                </label>
                <input wire:model='image' id="image" type="file" accept="image/png, image/jpg, image/jpeg"
                    hidden>
                <x-error name="image" />
            </div>

            <div class="create__post-left">
                <div class="mb-3">
                    <label for="title">{{ trans('dashboard.post.Title') }}</label>
                    <input wire:model.blur='title' id="title" type="text" class="form-control"
                        placeholder="{{ trans('dashboard.post.Title placeholder') }}">
                    <x-error name="title" />
                </div>

                <div class="mb-3">
                    <label for="subtitle">{{ trans('dashboard.post.Subtitle') }}</label>
                    <input wire:model='subtitle' id="subtitle" type="text" class="form-control"
                        placeholder="{{ trans('dashboard.post.Subtitle placeholder') }}">
                    <x-error name="subtitle" />
                </div>

                <div class="mb-3">
                    <label for="slug">{{ trans('dashboard.post.Slug') }}</label>
                    <input wire:model='slug' id="slug" type="text" class="form-control"
                        placeholder="{{ trans('dashboard.post.Slug placeholder') }}">
                    <x-error name="slug" />
                </div>
            </div>
        </div>

        <div class="create__post-bottom">
            <div class="create__post-bottom-row">
                <div class="mb-3">
                    <label for="content">{{ trans('dashboard.post.Content') }}</label>
                    <textarea wire:model='content' id="content" cols="30" rows="10" class="form-control"
                        placeholder="{{ trans('dashboard.post.Content placeholder') }}"></textarea>
                    <x-error name="content" />
                </div>
            </div>

            <div class="create__post-bottom-row">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category_id">{{ trans('dashboard.post.Category') }}</label>
                        <select wire:model='category_id' id="category_id" class="form-select">
                            <option value="" selected>{{ trans('dashboard.post.Category placeholder') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-error name="category_id" />
                    </div>

                    <div class="col-md-6">
                        <label for="status">{{ trans('dashboard.post.Status') }}</label>
                        <select wire:model='status' id="status" class="form-select">
                            <option value="draft">{{ trans('dashboard.post.Draft') }}</option>
                            <option value="published">{{ trans('dashboard.post.Published') }}</option>
                        </select>
                        <x-error name="status" />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tag_ids">{{ trans('dashboard.post.Tags') }}</label>
                    <select wire:model='tag_ids' id="tag_ids" class="form-select" multiple>
                        <option value="" selected>{{ trans('dashboard.post.Tags placeholder') }}</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <x-error name="tag_ids" />
                </div>

                <div class="d-flex justify-content-end">
                    <button wire:click.prevent='create' type="button" class="btn btn-primary px-5">
                        {{ trans('dashboard.post.Create') }}
                    </button>
                </div>
            </div>
        </div>
    </section>
</form>
