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
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-100">
                        <td class="py-4 px-4 font-bold text-gray-800">{{ $post['id'] }}</td>
                        <td class="py-4 px-4 text-gray-700">{{ $post['title'] }}</td>
                        <td class="py-4 px-4 text-gray-700">{{ $post['creator']['name'] }}</td>
                        <td class="py-4 px-4 text-gray-700">{{ $post['creator']['created_at'] }}</td>
                        <td class="py-4 px-4">
                            <div class="flex gap-1">
                                <a href="{{ route('posts.show', $post['id']) }}"
                                    class="bg-cyan-500 text-white text-sm px-3 py-1 rounded">View</a>
                                <a href="{{ route('posts.edit', $post['id']) }}"
                                    class="bg-blue-500 text-white text-sm px-3 py-1 rounded">Edit</a>
                                <button onclick="deletePost()" class="bg-red-500 text-white text-sm px-3 py-1 rounded">
                                    Delete
                                </button>
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
        <div class="flex items-center gap-1">
            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600">Previous</button>
            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600">1</button>
            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600">2</button>
            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600">3</button>
            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600">Next</button>
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
