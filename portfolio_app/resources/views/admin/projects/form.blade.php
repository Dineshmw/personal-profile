@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.projects.index') }}" class="text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($project) ? 'Edit Project' : 'Create New Project' }}</h1>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-3xl">
    <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
        @csrf
        @if(isset($project))
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="col-span-1 border-b pb-1 border-gray-100">
                <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 sm:text-sm py-2 px-3 border border-gray-300">
            </div>

            <!-- Category -->
            <div class="col-span-1 border-b pb-1 border-gray-100">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 sm:text-sm py-2 px-3 border border-gray-300 bg-white">
                    @php $categories = ['Backend/Frontend', 'Data Science Machine learning', 'Gen AI', 'Automations']; @endphp
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category', $project->category ?? 'Backend/Frontend') === $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 sm:text-sm py-2 px-3 border border-gray-300">{{ old('description', $project->description ?? '') }}</textarea>
        </div>

        <!-- Image Upload -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Cover Image <span class="text-gray-400 font-normal">(Optional)</span></label>
            @if(isset($project) && $project->image_url)
                <div class="mt-2 mb-3">
                    <img src="{{ $project->image_url }}" alt="Current Image" class="h-32 rounded border border-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Current image. Upload a new one to replace it.</p>
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <!-- Project URL -->
        <div>
            <label for="project_url" class="block text-sm font-medium text-gray-700">Project Link <span class="text-gray-400 font-normal">(Optional)</span></label>
            <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url ?? '') }}" placeholder="https://github.com/your/project"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 sm:text-sm py-2 px-3 border border-gray-300">
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                {{ isset($project) ? 'Update Project' : 'Save Project' }}
            </button>
        </div>
    </form>
</div>
@endsection
