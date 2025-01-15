<div class="container mx-auto p-4 pt-6 mb-12">
    <h1 class="text-2xl text-primary-variant font-semibold mb-4">Gallery</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($galleries as $gallery)
        <div x-data="{modalIsOpen: false}">
            <div @click="modalIsOpen = true" class="aspect-square cursor-pointer">
                <img class="object-cover h-full w-full rounded-lg" src="{{ env('APP_URL').'/storage/images/gallery/'.$gallery['data'] }}" alt="">
            </div>
            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-50 flex w-full items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                    <img class="h-auto max-w-full rounded-lg" src="{{ env('APP_URL').'/storage/images/gallery/'.$gallery['data'] }}" alt="">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
