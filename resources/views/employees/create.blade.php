@extends('layouts.app')

@section('main')
    <section class="container text-center p-2">
        <h2 class="">ADD New Employee details</h2>
    </section>
    <section class="add-employeeform container">
        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">New Employee Name:</label>
                <input type="text" name="name" id="name" required
                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Employee Name"
                    value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" name="designation" id="designation" required
                    class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}"
                    placeholder="Employee Designstion" value="{{ old('designation') }}">
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('designation') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="salary">salary</label>
                <input type="text" name="salary" id="salary"
                    class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" placeholder="Employee salary"
                    value="{{ old('salary') }}">
                @if ($errors->has('salary'))
                    <span class="error">{{ $errors->first('salary') }}</span>
                @endif
            </div>
            <a href="{{ route('employees.index') }}" class="btn btn-danger m-3 ">cancel</a>
            <button type="submit" class="btn btn-success m-3 ">save</button>
        </form>
    </section>
@endsection
