@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.projects.update', ['project'=> $project->slug]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$project->title) }}">
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

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content',$project->content) }}</textarea>
        </div>

        <div class="mt-4 mb-4"><button class="btn btn-success" type="submit">Salva</button></div>
    </form>
    <img class="w-25" src="{{ asset('storage/' . $project->cover_img) }}" alt="">
@endsection

