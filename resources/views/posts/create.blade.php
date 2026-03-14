<x-layout>

    <x-slot name="title">
        Create Post
    </x-slot>
    <div class="max-w-4xl mx-auto px-6 py-10">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            

            <!-- Title -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Title</label>
                <input type="text" name="title" value = "{{ old('title') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300" />
                @error('title')
                    <p class="text-red-500 text-m mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Description -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Description</label>
                <textarea rows="5" name="description" value = "{{ old('description') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 resize-y"></textarea>
                    @error('description')
                    <p class="text-red-500 text-m mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Post Creator -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Post Creator</label>

                <select name="user_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach

                </select>
                @error('user_id')
                    <p class="text-red-500 text-m mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Create Button -->
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded shadow">
                Create
            </button>

        </form>

    </div>
</x-layout>
