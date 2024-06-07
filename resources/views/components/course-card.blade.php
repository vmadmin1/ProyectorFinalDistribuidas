@props(['course'])

<article class="bg-white shadow-lg rounded overflow-hidden">
    <figure>
        <img id="imgPreview" class="w-full aspect-video object-cover object-center"
            src="{{ $course->image_url }}" alt="{{ $course->title }}">
    </figure>
    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>
        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>
        </div>
        <a href="{{ route('courses.show', $course) }}" class="block btn btn-red w-full mt-4 text-center">
            Más información
        </a>
    </div>
</article>
