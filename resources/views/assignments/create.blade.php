@extends('layouts.app')

@section('content')
<div class="card bg-dark border-secondary text-white">
    <div class="card-header border-secondary d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add New Assignment</h4>
        <a href="{{ route('assignments.index') }}" class="btn btn-sm btn-outline-light">Back to List</a>
    </div>
    <div class="card-body">
        <form action="{{ route('assignments.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Assignment Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-dark text-white border-secondary @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-dark text-white border-secondary @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control bg-dark text-white border-secondary @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select bg-dark text-white border-secondary @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-purple px-4 py-2">Save Assignment</button>
        </form>
    </div>
</div>

<style>
    /* Dark theme fix for input date picker */
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>
@endsection
