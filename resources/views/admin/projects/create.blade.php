@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <label for="type">Choose Project type</label>
            <select name="type_id" for="type" class="form-select">
                <option selected></option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="content" class="form-label">Project content</label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Project image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_img">
            </div>

            <div class="mb-4">
                <ul class="list-group">
                    @foreach ($technologies as $technology)                        
                    <li class="list-group-item">
                        <input name="technologies[]" class="form-check-input me-1" type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                        <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
