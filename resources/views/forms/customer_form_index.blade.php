@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submitted Customer Forms</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Factory Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customerForms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->factory_name }}</td>
                    <td>{{ $form->first_name }}</td>
                    <td>{{ $form->last_name }}</td>
                    <td>{{ $form->mobile_number }}</td>
                    <td>{{ $form->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <!-- You can add buttons for editing or deleting here -->
                        <a href="{{ route('customer_forms.show', $form->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('customer_forms.create') }}" class="btn btn-primary">Add New Form</a>
</div>
@endsection
