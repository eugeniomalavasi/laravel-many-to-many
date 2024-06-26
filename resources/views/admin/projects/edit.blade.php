@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
        </div>

        <label for="type">Choose Project type</label>
        <select name="type_id" for="type" class="form-select">
            <option selected></option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Project image</label>
            <input type="file" class="form-control" id="cover_image" name="cover_img">
        </div>

        <div class="mb-4">
            <ul class="list-group">
                @foreach ($technologies as $technology)
                    <li class="list-group-item">
                        @if (old('technologies') !== null)
                            <input @checked(in_array($technology->id, old('technologies'))) name="technologies[]" class="form-check-input me-1"
                                type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                        @else
                            <input @checked($project->technologies->contains($technology)) name="technologies[]" class="form-check-input me-1"
                                type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                        @endif
                        <label class="form-check-label"
                            for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
        </div>

        <div class="mt-4 mb-4"><button class="btn btn-success" type="submit">Salva</button></div>
    </form>
    <img class="w-25" src="{{ asset('storage/' . $project->cover_img) }}" alt="">
@endsection
