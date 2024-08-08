@extends('layouts.app')

@section('main')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
    @endif
    <section class="d-flex justify-content-end">
        <a href="{{ route('employees.index') }}" class="add-btn">back</a>
    </section>
    <section class="employees">
        <table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>designation</th>
                <th>salary</th>
                <th colspan="2">Actions</th>
            </tr>
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->designation }}</td>
                <td>{{ $employee->salary }}</td>
                <td><a href="{{ route('employees.edit', $employee->id) }}" role="button" aria-label="update"><i
                            class="fa-solid fa-pen-to-square"></i>update</a></td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash"></i>delete</button>
                </td>
                </form>
            </tr>
        </table>
    </section>
@endsection
