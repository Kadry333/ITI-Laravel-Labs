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
                <p class="text-gray-600 mt-1">{{$post['description']}}</p>
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
                    <span class="font-bold">Name</span> {{ $post['creator']['name'] }}
                </p>
                <p class="text-gray-800 mb-3">
                    <span class="font-bold">Email</span> {{ $post['creator']['email'] }}
                </p>
                <p class="text-gray-800 mb-4">
                    <span class="font-bold">Created At</span> {{ $post['creator']['created_at'] }}
                </p>
            </div>
        </div>



    </div>

</x-layout>
