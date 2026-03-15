<x-layout>

    <div class="max-w-4xl mx-auto px-6 py-10 flex flex-col gap-6">

        <!-- Post Info Card -->
        <div class="border border-gray-200 rounded">
            <!-- Card Header -->
            <div class="bg-gray-100 border-b border-gray-200 px-4 py-3">
                <span class="text-gray-700">Post Info</span>
            </div>
            <!-- Card Body -->
            <div class="px-4 py-5">
                <p class="text-gray-800 mb-3">
                    <span class="font-bold">Title</span> {{ $post['title'] }}
                </p>
                <p class="font-bold text-gray-800">Description :-</p>
                <p class="text-gray-600 mt-1">{{ $post['description'] }}</p>
                @if ($post->image)
                    <p class="font-bold text-gray-800">Image:-</p>
                    <img src="{{ asset('storage/' . $post->image) }}" width="120" class="rounded">
                @endif




            </div>
        </div>

        <!-- Post Creator Info Card -->
        <div class="border border-gray-200 rounded">
            <!-- Card Header -->
            <div class="bg-gray-100 border-b border-gray-200 px-4 py-3">
                <span class="text-gray-700">Post Creator Info</span>
            </div>
            <!-- Card Body -->
            <div class="px-4 py-5">
                <p class="text-gray-800 mb-3">
                    <span class="font-bold">Name</span> {{ $post->user?->name }}
                </p>
                <p class="text-gray-800 mb-3">
                    <span class="font-bold">Email</span> {{ $post->user?->email }}
                </p>
                <p class="text-gray-800 mb-4">
                    <span class="font-bold">Created At</span> {{ $post->user?->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        <div class="border border-gray-200 rounded p-4 flex flex-col gap-4">
            <h3 class="font-bold text-lg">Comments</h3>
            @foreach ($post->comments as $comment)
                <div class="border p-3 rounded flex flex-col gap-2">
                    <p>{{ $comment->body }}</p> <!-- Update Comment -->
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}"> @csrf @method('PATCH')
                        <input type="text" name="body" value="{{ $comment->body }}" class="border px-2 py-1">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded"> Update </button> </form>
                    <!-- Delete Comment -->
                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}"> @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded"> Delete </button> </form>
                </div>
            @endforeach <!-- Add Comment -->
            <form method="POST" action="{{ route('comments.store', $post) }}"> @csrf
                <textarea name="body" class="border p-2 w-full"></textarea> <button class="bg-green-500 text-white px-4 py-1 rounded mt-2"> Add Comment
                </button>
            </form>
        </div>

</x-layout>
