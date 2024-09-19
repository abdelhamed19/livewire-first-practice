<div>
    @include('livewire.includes.create-post')
    @include('livewire.includes.search-post')

    <div id="todos-list">
        @forelse ($posts as $post)
            <div wire:key="{{ $post->id }}"
                class="todo mb-6 card p-6 bg-white shadow-sm rounded-lg border border-gray-200 hover:shadow-lg transition-shadow duration-200 ease-in-out">
                <div class="flex justify-between items-center mb-4">
                    @if ($post->id === $editId)
                    <input type="text" wire:model="newTitle"
                           class="text-lg font-semibold text-gray-900 bg-gray-100 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                           <button wire:click="update"
                               class="text-sm text-blue-600 font-semibold rounded hover:text-blue-800 transition-colors duration-150">
                               Update
                           </button>
                           <button wire:click="cancel"
                               class="text-sm text-red-600 font-semibold rounded hover:text-red-800 transition-colors duration-150">
                               Cancel
                            </button>
                @else
                    <h1 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h1>
                @endif
                    <div class="flex space-x-2">
                        <button wire:click="edit({{ $post->id }})"
                            class="text-sm text-teal-600 font-semibold rounded hover:text-teal-800 transition-colors duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                        <button wire:click="delete({{ $post->id }})"
                            class="text-sm text-red-600 font-semibold rounded hover:text-red-800 transition-colors duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="text-sm text-gray-700 mb-4">{{ $post->body }}</p>
                <div class="text-xs text-gray-500">{{ $post->created_at }}</div>
            </div>
        @empty
            <div class="text-center text-gray-600">
                <h3>No posts yet</h3>
            </div>
        @endforelse
        <div class="mt-6">
            {{ $posts->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>
