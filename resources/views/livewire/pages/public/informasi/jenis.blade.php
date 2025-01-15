<div class="container mx-auto p-4 mb-12">
    @if ($id)
    <h1 class="mt-4 max-w-2xl mx-auto text-2xl text-primary-variant text-center font-semibold">{{ $judul }}</h1>
    <div class="mx-auto max-w-2xl mt-8 mb-2">
        <img class="w-full dark:hidden" src="{{ env('APP_URL').'/storage/images/informasi/'.$jenis.'/'.$gambar }}" alt="" />
    </div>
    <div class="mx-auto max-w-2xl mb-8 text-sm pl-2">
        <span>{{ $created_at->format('d M Y') }}</span>
    </div>
    <div class="mx-auto max-w-2xl space-y-6">
        {!! $deskripsi !!}
    </div>
    @else
    <h1 class="text-2xl text-primary-variant font-semibold mb-4">{{ Str::title($jenis) }}</h1>
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
        <form class="max-w-md mx-auto mb-4">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model.live="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required/>
            </div>
        </form>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($jeniss as $index => $item)
            <livewire:components.card :key="$jeniss->firstItem() + $index" :id="$item['id']" :jenis="$item['jenis']" :judul="$item['judul']" :gambar="$item['gambar']" :deskripsi="$item['deskripsi']" :created_at="$item['created_at']" />
            @endforeach
        </div>
        {{ $jeniss->links() }}
        {{-- <div class="w-full text-center">
        <button type="button" class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Show more</button>
        </div> --}}
    </div>
    @endif
</div>