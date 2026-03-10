@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.skills.index') }}" class="text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($skill) ? 'Edit Skill' : 'Add New Skill' }}</h1>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-2xl">
    <form action="{{ isset($skill) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
        @csrf
        @if(isset($skill))
            @method('PUT')
        @endif

        @if ($errors->any())
            <div class="bg-red-50 p-4 border border-red-200 rounded-lg">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Skill Name (e.g. Laravel / PHP)</label>
            <input type="text" name="name" id="name" value="{{ old('name', $skill->name ?? '') }}" required placeholder="e.g. React.js"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 sm:text-sm py-2 px-3 border border-gray-300">
        </div>

        <!-- Proficiency -->
        <div>
            <label for="proficiency" class="block text-sm font-medium text-gray-700">Proficiency Level (%)</label>
            <div class="flex items-center gap-4 mt-1">
                <input type="range" name="proficiency_slider" id="proficiency_slider" min="0" max="100" value="{{ old('proficiency', $skill->proficiency ?? 85) }}"
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="document.getElementById('proficiency').value = this.value">
                <input type="number" name="proficiency" id="proficiency" value="{{ old('proficiency', $skill->proficiency ?? 85) }}" min="0" max="100" required
                    class="w-20 rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 sm:text-sm py-2 px-3 border border-gray-300 text-center"
                    oninput="document.getElementById('proficiency_slider').value = this.value">
            </div>
            <p class="text-xs text-gray-500 mt-2">Adjust the slider or type a value between 0 and 100.</p>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                {{ isset($skill) ? 'Update Skill' : 'Save Skill' }}
            </button>
        </div>
    </form>
</div>
@endsection
