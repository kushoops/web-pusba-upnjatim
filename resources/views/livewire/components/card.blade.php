<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ env('APP_URL').'/informasi/'.$jenis.'/'.$id }}" class="block aspect-video">
        <img class="object-cover h-full w-full rounded-t-lg" src="{{ env('APP_URL').'/storage/images/informasi/'.$jenis.'/'.$gambar }}" alt="" />
    </a>
    <div class="p-5">
        <a href="{{ env('APP_URL').'/informasi/'.$jenis.'/'.$id }}">
            <h5 class="mb-2 text-lg font-bold tracking-tight text-primary-variant dark:text-white">{{ $judul }}</h5>
        </a>
        <div class="max-h-24 overflow-hidden mb-3 dark:text-gray-400">{!! $deskripsi !!}</div>
        <div class="flex justify-between items-center">
            <a href="{{ env('APP_URL').'/informasi/'.$jenis.'/'.$id }}" class="inline-flex items-center font-medium text-primary-variant dark:text-primary-500 hover:underline">
                Selengkapnya
                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <span class="text-sm">{{ $created_at->format('d M Y') }}</span>
        </div>
    </div>
</div>