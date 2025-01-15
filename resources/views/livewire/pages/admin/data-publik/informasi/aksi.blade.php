<div class="p-4 mt-16">
  @if ($aksi=='lihat')
    <h1 class="mt-4 max-w-2xl mx-auto text-2xl text-center font-semibold">{{ $judul }}</h1>
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
  <form wire:submit='{{ $aksi=='tambah'?'createInformasi':'updateInformasi' }}'>
      <h3 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">
          {{ Str::title($aksi).' '.Str::title($jenis) }}
      </h3>
      <div class="mb-6">
          <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
          <input wire:model="judul" type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div> 
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Gambar</label>
        @if ($gambarLama)
          <img class="max-h-32 mb-2" src="{{ env('APP_URL').'/storage/images/informasi/'.$jenis.'/'.$gambarLama }}">
        @endif
        @if ($gambar)
          <img class="max-h-32 mb-2" src="{{ $gambar->temporaryUrl() }}">
        @endif
          <input wire:model="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" accept="image/png, image/jpg" {{ $jenis=='tambah'?'required':''}}>
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG (Max 1MB).</p>
          @error('gambar') <span class="error">{{ $message }}</span> @enderror
      </div>
      <div class="mb-6">
          <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
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
      <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Submit</button>
  </form>
  @endif
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
    quill.root.innerHTML = '{!! $deskripsi !!}';
    quill.on('text-change', () => {@this.set('deskripsi', quill.getSemanticHTML())});
</script>