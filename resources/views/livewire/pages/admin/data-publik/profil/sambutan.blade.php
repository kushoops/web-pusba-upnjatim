<div class="p-4 mt-16">
    <a href="{{ env('APP_URL').'/data-publik/profil/sambutan' }}">
        <button type="button" class="{{ $jenis == 'sambutan' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Sambutan</button>
    </a>
    <a href="{{ env('APP_URL').'/data-publik/profil/visi-misi' }}">
        <button type="button" class="{{ $jenis == 'visi-misi' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Visi Misi</button>
    </a>
    <a href="{{ env('APP_URL').'/data-publik/profil/struktur-organisasi' }}">
        <button type="button" class="{{ $jenis == 'struktur-organisasi' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Struktur Organisasi</button>
    </a>
    <a href="{{ env('APP_URL').'/data-publik/profil/pengajar' }}">
        <button type="button" class="{{ $jenis == 'pengajar' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Pengajar</button>
    </a>
    <a href="{{ env('APP_URL').'/data-publik/profil/gallery' }}">
        <button type="button" class="{{ $jenis == 'gallery' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Gallery</button>
    </a>

    <form wire:submit="updateFoto" class="w-full bg-white p-4 rounded my-2">
        <div class="mb-5">
            <label for="file_input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Foto Kepala UPA Bahasa</label>
            @if ($fotoLama)
            <img class="max-h-32 mb-2" src="{{ env('APP_URL').'/storage/images/'.$fotoLama }}">
            @endif
            @if ($foto)
            <img class="max-h-32 mb-2" src="{{ $foto->temporaryUrl() }}">
            @endif
            <input wire:model="foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" accept="image/jpg, image/png">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG 1:1 (MAX 1MB).</p>
            @error('foto') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
    </form>

    <form wire:submit="updateSambutan" class="w-full bg-white p-4 rounded my-2">
        <div class="mb-5">
            <h3 class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Sambutan</h3>
        </div>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kepala UPA Bahasa</label>
            <input wire:model="nama" type="text" id="nama" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="mb-5">
            <label for="sambutan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sambutan</label>
            <div id="toolbar-container" wire:ignore>
                <span class="ql-formats">
                    <select class="ql-size"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-strike"></button>
                </span>
                <span class="ql-formats">
                    <select class="ql-color"></select>
                    <select class="ql-background"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-indent" value="-1"></button>
                    <button class="ql-indent" value="+1"></button>
                </span>
                <span class="ql-formats">
                    <button class="ql-direction" value="rtl"></button>
                    <select class="ql-align"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-link"></button>
                </span>
            </div>
            <div id="{{ $quillId }}" wire:ignore></div>
        </div>
        <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    const quill = new Quill('#{{ $quillId }}', {
        modules: {
            syntax: true,
            toolbar: '#toolbar-container',
        },
        // placeholder: 'Compose an epic...',
        theme: 'snow',
    });
    quill.root.innerHTML = '{!! $sambutan !!}';
    quill.on('text-change', () => {@this.set('sambutan', quill.getSemanticHTML())});
</script>