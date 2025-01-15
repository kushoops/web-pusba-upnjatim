<div class="p-4 mt-16">
    <a href="{{ env('APP_URL').'/data-publik/layanan/ept' }}">
        <button type="button" class="{{ $jenis == 'ept' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">EPT</button>
    </a>
    <a href="{{ env('APP_URL').'/data-publik/layanan/bipa' }}">
        <button type="button" class="{{ $jenis == 'bipa' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">BIPA</button>
    </a>
    <a href="{{ env('APP_URL').'/data-publik/layanan/pelatihan-bahasa' }}">
        <button type="button" class="{{ $jenis == 'pelatihan-bahasa' ? 'text-neutral-100 bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Pelatihan Bahasa</button>
    </a>

    <form wire:submit="updateEpt" class="w-full bg-white p-4 rounded my-2">
        <div class="mb-5">
            <label for="tes-bahasa" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">EPT</label>
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
    quill.root.innerHTML = '{!! $ept !!}';
    quill.on('text-change', () => {@this.set('ept', quill.getSemanticHTML())});
</script>