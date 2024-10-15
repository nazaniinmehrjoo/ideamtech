@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cooperation List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Company Phone</th>
                <th>Company Email</th>
                <th>Country</th>
                <th>National ID</th>
                <th>Activity Field</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cooperations as $cooperation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cooperation->company_name }}</td>
                    <td>{{ $cooperation->company_phone }}</td>
                    <td>{{ $cooperation->company_email }}</td>
                    <td>{{ $cooperation->country }}</td>
                    <td>{{ $cooperation->national_id }}</td>
                    <td>{{ $cooperation->activity_field }}</td>
                    <td>
                        <a href="{{ route('cooperations.edit', $cooperation->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cooperations.destroy', $cooperation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No cooperation records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('cooperations.create') }}" class="btn btn-primary">Add New Cooperation</a>
</div>
@endsection
