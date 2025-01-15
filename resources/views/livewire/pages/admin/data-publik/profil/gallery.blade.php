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

    <div class="mt-2" x-data="{modalIsOpen: false}">
        <button @click="modalIsOpen = true" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Tambah</button>
        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-50 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
            <!-- Modal Dialog -->
            <form wire:submit="createPublik" x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-screen max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                <!-- Dialog Header -->
                <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Tambah Gambar</h3>
                    <button @click="modalIsOpen = false" aria-label="close modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <!-- Dialog Body -->
                <div class="p-4"> 
                    @if ($data) 
                        <img class="max-h-32" src="{{ $data->temporaryUrl() }}">
                    @endif
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                    <input wire:model="data" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" accept="image/jpg, image/png" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG (Max 1MB).</p>
                    @error('data') <span class="error">{{ $message }}</span> @enderror
                </div>
                <!-- Dialog Footer -->
                <div class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                    {{-- <button @click="modalIsOpen = false" type="button" class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Remind me later</button> --}}
                    <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-2 overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
        <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
            <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4 w-1">No</th>
                    <th scope="col" class="p-4">Gambar</th>
                    <th scope="col" class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @php
                $i = 1
                @endphp
                @foreach ($galleries as $gallery)
                <tr>
                    <td class="p-4 text-center">{{ $i++ }}</td>
                    <td class="p-4">
                        <img class="w-40" src="{{ env('APP_URL').'/storage/images/gallery/'.$gallery['data'] }}" alt="">
                    </td>
                    <td class="p-4" x-data="{modalIsOpen: false}">
                        <button @click="modalIsOpen = true" wire:click="setOldData('{{ $gallery['data'] }}')" class="cursor-pointer whitespace-nowrap rounded-md bg-transparent p-0.5 font-semibold text-black outline-black hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-white dark:outline-white">Ubah</button>
                        <button wire:click="deletePublik({{ $gallery['id'] }}, '{{ $gallery['data'] }}')" wire:confirm="Apakah Anda yakin untuk menghapus data ini?" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-transparent p-0.5 font-semibold text-black outline-black hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-white dark:outline-white">Hapus</button>
                        <form wire:submit="updatePublik" x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-50 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                            <!-- Modal Dialog -->
                            <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-screen max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                                <!-- Dialog Header -->
                                <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Ubah Gambar</h3>
                                    <button @click="modalIsOpen = false" aria-label="close modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Dialog Body -->
                                <div class="p-4"> 
                                    @if ($data) 
                                        <img class="max-h-32" src="{{ $data->temporaryUrl() }}">
                                    @endif
                                    {{-- <input name="oldData" type="hidden" value="{{ $gallery['data'] }}"> --}}
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                    <input wire:model="data" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" accept="image/jpg, image/png" required>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG (Max 1MB).</p>
                                    @error('data') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <!-- Dialog Footer -->
                                <div class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                                    <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
