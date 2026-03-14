<x-layout>
    <div id="successMessage" class="hidden fixed inset-0 flex items-center justify-center bg-black/30">

        <div class="bg-green-100 text-green-700 px-6 py-4 rounded shadow-lg">
            Post deleted successfully
        </div>

    </div>
    <div class="max-w-4xl mx-auto px-6 py-10">

        <!-- Create Post Button -->
        <div class="flex justify-center mb-8">
            <a href="{{ route('posts.create') }}" class="bg-green-500 text-white font-semibold px-6 py-2 rounded shadow">
                Create Post
            </a>
        </div>

        <!-- Top Pagination Label -->
        <p class="text-red-500 font-medium mb-3">Pagination in lab 2</p>

        <!-- Table -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b-2 border-gray-200">
                    <th class="text-left py-3 px-4 text-gray-700 font-semibold w-16">ID</th>
                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Title</th>
                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Posted By</th>
                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Created At</th>
                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-100">
                        <td class="py-4 px-4 font-bold text-gray-800">{{ $post['id'] }}</td>
                        <td class="py-4 px-4 text-gray-700">{{ $post['title'] }}</td>
                        <td class="py-4 px-4 text-gray-700">{{ $post->user?->name }}</td>
                        <td class="py-4 px-4 text-gray-700">{{ $post->created_at->diffForHumans() }}</td>
                        <td class="py-4 px-4">
                            <div class="flex gap-1">
                                <x-button href="{{ route('posts.show', $post->id) }}">Show</x-button>
                                <x-button href="{{ route('posts.edit', $post->id) }}">Edit</x-button>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this post?')">

                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


                <!-- add more rows here -->
            </tbody>
        </table>

        <!-- Bottom Pagination Label -->
        <p class="text-red-500 font-medium mt-8 mb-3">Pagination in lab 2</p>

        <!-- Pagination Controls -->
        <div class="flex flex-wrap items-center gap-1">

            <a href="{{ $posts->previousPageUrl() }}" class="px-3 py-1 border rounded">Previous</a>

            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                <a href="{{ $posts->url($i) }}" class="px-3 py-1 border rounded">
                    {{ $i }}
                </a>
            @endfor

            <a href="{{ $posts->nextPageUrl() }}" class="px-3 py-1 border rounded">Next</a>

        </div>

    </div>
    <script>
        function deletePost() {

            if (confirm("Are you sure you want to delete this post?")) {

                showSuccess();

            }

        }

        function showSuccess() {

            let message = document.getElementById("successMessage");

            message.classList.remove("hidden");

            setTimeout(function() {
                message.classList.add("hidden");
            }, 1000);

        }
    </script>
</x-layout>
