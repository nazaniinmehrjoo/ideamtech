@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Client</th>
                <th>Start Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
