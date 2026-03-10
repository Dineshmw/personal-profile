@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Manage Skills</h1>
        <p class="text-sm text-gray-500 mt-1">Add or update your technical proficiencies.</p>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center px-4 py-2 bg-primary hover:bg-blue-600 text-white font-medium text-sm rounded-lg shadow transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add Skill
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skill Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proficiency Level</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($skills as $skill)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $skill->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <span class="text-sm text-gray-700 w-8">{{ $skill->proficiency }}%</span>
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to remove this skill?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                        No skills added yet. Create one to get started!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
