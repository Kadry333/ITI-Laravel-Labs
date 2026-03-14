<x-layout>

    <!-- Form -->
    <div class="max-w-4xl mx-auto px-6 py-10">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Title -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300" />
                @error('title')
                    <p class="text-red-500 text-m mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Description</label>
                <textarea rows="5" name="description"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 resize-y">
{{ $post->description }}
</textarea>
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
            </div>
            <!-- Create Button -->
            <div class="mb-6">
                <button type="submit"
                    class="bg-green-500 text-white font-semibold px-6 py-2 rounded shadow">Update</button>
            </div>

        </form>

    </div>
</x-layout>
