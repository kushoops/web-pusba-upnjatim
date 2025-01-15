<div class="container mx-auto p-4 pt-6 mb-12">
    <h1 class="text-2xl text-primary-variant font-semibold mb-12">Sambutan Kepala UPA Bahasa</h1>
    <img class="mx-auto w-64 h-64 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{ env('APP_URL').'/storage/images/'.$fotoKepala }}" alt="Bordered avatar">
    <p class="text-center text-lg font-bold py-8">{{ $namaKepala }}</p>
    <div>{!! $sambutan !!}</div>
</div>