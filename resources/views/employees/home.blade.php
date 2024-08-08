@extends('layouts.app')

@section('main')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
    @endif
    <section class="d-flex justify-content-end">
        <a href="{{ route('employees.create') }}" class="add-btn">add employee</a>
    </section>
    <section class="employees">
        @if ($employees)
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>designation</th>
                    <th>salary</th>
                    <th colspan="3">Actions</th>
                </tr>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->designation }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td><a href="{{ route('employees.edit', $employee->id) }}" role="button" aria-label="update"><i
                                    class="fa-solid fa-pen-to-square"></i>update</a></td>
                        <td><a href="{{ route('employees.show', $employee->id) }}" role="button" aria-label="update"><i
                                    class="fa-solid fa-eye"></i>view</a></td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa-solid fa-trash"></i>delete</button>
                        </td>
                        </form>
                    </tr>
                @endforeach
            </table>
            <div class="m-4">
                {{ $employees->links() }}
            </div>
        @else
            <p>NO Records Found <a href="{{ route('employees.create') }}">add employee</a></p>
        @endif
    </section>
@endsection
