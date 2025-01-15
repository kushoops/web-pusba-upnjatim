<div>
    {{-- Carousel --}}
    @if (!empty($carousels[0]))
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative aspect-[3/1] overflow-hidden">
            @foreach ($carousels as $carousel)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ env('APP_URL').'/storage/images/carousel/'.$carousel['data'] }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            @for ($i=2; $i<=$carousels->count(); $i++)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $i }}" data-carousel-slide-to="{{ $i }}"></button>
            @endfor
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    @endif

    {{-- Layanan --}}
    <section class="container mx-auto py-12 md:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                <div class="relative w-full text-center lg:text-left lg:w-2/4">
                    <h2 class="text-4xl text-center font-bold text-primary-variant leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Layanan Kami</h2>
                </div>
                <div class="relative w-full lg:w-2/4">
                    <p class="text-lg indent-8 text-justify font-normal text-gray-500 mb-5">{{ $layanan }}</p> 
                </div>
            </div>
            <div class="flex text-center justify-center items-strech  gap-x-5 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-evenly lg:gap-x-8">
                <div onclick="location.href = '{{ env('APP_URL').'/layanan/ept' }}';" class="cursor-pointer group bg-primary hover:bg-primary-variant relative w-full rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 xl:p-7 xl:w-1/4">
                    <div class="mx-auto bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg class="w-10 h-10 text-primary-variant dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-3 capitalize transition-all duration-500 group-hover:text-white">EPT</h4>
                    <p class="text-sm font-normal text-gray-100 transition-all duration-500 leading-5 group-hover:text-white">
                        {{ $layanan1 }}
                    </p>
                </div>
                <div onclick="location.href = '{{ env('APP_URL').'/layanan/bipa' }}';" class="cursor-pointer group bg-primary hover:bg-primary-variant relative w-full rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 xl:p-7 xl:w-1/4">
                    <div class="mx-auto bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg class="w-10 h-10 text-primary-variant dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-3 capitalize transition-all duration-500 group-hover:text-white">BIPA</h4>
                    <p class="text-sm font-normal text-gray-100 transition-all duration-500 leading-5 group-hover:text-white">
                        {{ $layanan2 }}
                    </p>
                </div>
                <div onclick="location.href = '{{ env('APP_URL').'/layanan/pelatihan-bahasa' }}';" class="cursor-pointer group bg-primary hover:bg-primary-variant relative w-full rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 xl:p-7 xl:w-1/4">
                    <div class="mx-auto bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14 ">
                        <svg class="w-10 h-10 text-primary-variant dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-3 capitalize transition-all duration-500 group-hover:text-white">Pelatihan Bahasa</h4>
                    <p class="text-sm font-normal text-gray-100 transition-all duration-500 leading-5 group-hover:text-white">
                        {{ $layanan3 }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sambutan --}}
    <section class="bg-secondary dark:bg-gray-900">
        <div class="grid container px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="text-primary-variant max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Sambutan Kepala UPA Bahasa</h1>
                <q class="max-w-2xl line-clamp-2 mb-4 font-light text-gray-500 lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400">{{ $sambutan }}</q>
                <p class="mb-6 font-bold text-black/80 text-md md:text-xl">{{ $namaKepala }}</p>
                <a href="{{ env('APP_URL').'/profil/sambutan' }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary-variant border border-primary-variant rounded-lg hover:text-secondary hover:bg-primary-variant dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="hidden mx-auto lg:mt-0 lg:col-span-5 lg:flex">
                <img class="w-80 h-80 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{ env('APP_URL').'/storage/images/'.$fotoKepala }}" alt="Bordered avatar">
            </div>                
        </div>
    </section>

    {{-- Video & Catatan --}}
    @if (!empty($videos[0]) || $catatanJudul)
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 pt-16 px-4 mx-auto container lg:py-16 lg:pt-32 lg:px-6">
            <div class="mx-auto flex flex-col justify-center gap-6 md:gap-12 md:flex-row">
                <div id="custom-controls-gallery" class="{{ !empty($videos[0]) ? '' : 'invisible' }} flex-1 relative w-full" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative aspect-video overflow-hidden rounded-lg">
                        @foreach ($videos as $video)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            {!! $video['data'] !!}
                        </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center items-center pt-4">
                        <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="{{ $catatanJudul ? '' : 'invisible' }} flex-1 w-full h-fit p-6 bg-secondary border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $catatanJudul }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{!! $catatanDeskripsi !!}</p>
                </div>
            </div>  
        </div>
    </section>
    @endif

    {{-- Agenda --}}
    @if (!empty($agendas[0]))
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 pt-16 px-4 mx-auto container lg:py-16 lg:pt-32 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="text-primary-variant mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold dark:text-white">Agenda</h2>
                {{-- <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p> --}}
            </div> 
            <div class="mx-auto grid gap-8 mb-8 w-fit md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($agendas as $agenda)
                <livewire:components.card :id="$agenda['id']" :jenis="$agenda['jenis']" :judul="$agenda['judul']" :gambar="$agenda['gambar']" :deskripsi="$agenda['deskripsi']" :created_at="$agenda['created_at']" />
                @endforeach
            </div>
            @if ($agendasNumber > 6)
            <div class="text-center mb-8">
                <a href="{{ env('APP_URL').'/informasi/agenda' }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary-variant border border-primary-variant rounded-lg hover:text-secondary hover:bg-primary-variant dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Pengumuman --}}
    @if (!empty($pengumumans[0]))
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto container lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="text-primary-variant mb-4 text-4xl tracking-tight font-extrabold dark:text-white">Pengumuman</h2>
                {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
            </div> 
            <div class="mx-auto grid gap-8 mb-8 w-fit md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($pengumumans as $pengumuman)
                <livewire:components.card :id="$pengumuman['id']" :jenis="$pengumuman['jenis']" :judul="$pengumuman['judul']" :gambar="$pengumuman['gambar']" :deskripsi="$pengumuman['deskripsi']" :created_at="$pengumuman['created_at']" />
                @endforeach
            </div>
            @if ($agendasNumber > 6)
            <div class="text-center mb-8">
                <a href="{{ env('APP_URL').'/informasi/pengumuman' }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary-variant border border-primary-variant rounded-lg hover:text-secondary hover:bg-primary-variant dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Berita --}}
    @if (!empty($beritas[0]))
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto container lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="text-primary-variant mb-4 text-4xl tracking-tight font-extrabold dark:text-white">Berita</h2>
                {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
            </div> 
            <div class="mx-auto grid gap-8 mb-8 w-fit md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($beritas as $berita)
                <livewire:components.card :id="$berita['id']" :jenis="$berita['jenis']" :judul="$berita['judul']" :gambar="$berita['gambar']" :deskripsi="$berita['deskripsi']" :created_at="$berita['created_at']" />
                @endforeach
            </div>  
            @if ($agendasNumber > 6)
            <div class="text-center mb-8">
                <a href="{{ env('APP_URL').'/informasi/berita' }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary-variant border border-primary-variant rounded-lg hover:text-secondary hover:bg-primary-variant dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

</div>

<script>
    const video = document.querySelector('#custom-controls-gallery');

    const iframes = document.querySelectorAll("iframe");
    for (let iframe of iframes) {
        iframe.classList.add("aspect-video");
        iframe.style.width = `${video.offsetWidth}px`;
        iframe.style.height = `${video.offsetWidth/16*9}px`;
    }
</script>