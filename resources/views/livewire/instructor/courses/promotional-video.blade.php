<div>

    @push('css')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    @endpush

    <h1 class="text-2xl font-semibold">
        Video Promocional
    </h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">
        <div class="cols-span-1">
            @if ($course->video_path)
                <div wire:ignore>
                    <div x-data x-init="let player = new Plyr($refs.player);">
                        <video x-ref="player" playsinline controls data-poster="{{ $course->image }}" class="aspect-video">
                            <source src="{{ Storage::url($course->video_path) }}">
                        </video>
                    </div>
                </div>
            @else
                <figure>
                    <img class="w-full aspect-video object-cover" src="{{ $course->image }}" alt="{{ $course->title }}">
                </figure>
            @endif
        </div>
        <div class="cols-span-1">
            <form wire:submit="save">

                <x-validation-errors />

                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt recusandae consectetur aspernatur
                    dolorem vitae rerum voluptatem placeat est, dolores quo molestiae magni aliquam! Nesciunt, voluptate
                    neque aliquam officia nam doloremque.
                </p>
                <x-progress-indicators wire:model="video" />

                <div class="flex justify-end mt-4">
                    <x-button>
                        Subir Video
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
        {{-- <script>
            const player = new Plyr('#player');
        </script> --}}
    @endpush

</div>
