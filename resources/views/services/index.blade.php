@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Services</h1>

    <a href="{{ route('services.create') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i> Add New Service
    </a>

    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Banner Image</th>
                <th>Page Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->category }}</td>
                <td>{{ \Illuminate\Support\Str::limit($service->content, 50) }}</td>
                <td>
                    @foreach(json_decode($service->banner_images) as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="Banner Image" style="width: 50px;">
                    @endforeach
                </td>
                <td>{{ $service->page_name }}</td>
                <td>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
