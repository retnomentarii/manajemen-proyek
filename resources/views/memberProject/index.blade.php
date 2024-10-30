@extends('layouts.app')

@section('content')
    <h1>Member Projects</h1>
    <a href="{{ route('member.projects.create') }}">Add New Member Project</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Member</th>
                <th>Project</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($memberProjects as $memberProject)
                <tr>
                    <td>{{ $memberProject->id }}</td>
                    <td>{{ $memberProject->user->name }}</td>
                    <td>{{ $memberProject->project->name }}</td>
                    <td>
                        <a href="{{ route('member.projects.show', $memberProject) }}">View</a>
                        <a href="{{ route('member.projects.edit', $memberProject) }}">Edit</a>
                        <form action="{{ route('member.projects.destroy', $memberProject) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
