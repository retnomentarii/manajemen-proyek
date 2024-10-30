@extends('layouts.app')

@section('content')
    <h1>Add Member Project</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.projects.store') }}" method="POST">
        @csrf
        <div>
            <label for="member_id">Member:</label>
            <select name="member_id" id="member_id" required>
                <option value="">Select Member</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" required>
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Add Member Project</button>
    </form>
@endsection
