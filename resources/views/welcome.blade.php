<x-app-layout>

    <section class="bg-cover" style="background-image: url({{ asset('img/home/home.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">
                    Capacitate con la ayuda de los mejores cursos en: CreArte
                </h1>
                <p class="text-white text-lg mt-2">
                    En CreArte encontrarás los mejores cursos que te ayudaran a convertirte en todo un profesional
                </p>
                
                {{--@livewire('Search')--}}

            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/cursosOnline.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Cursos Online
                    </h1>
                    <p class="text-sm text-gray-500">
                        Encuenta los mejores cursos en CreArte.
                    </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/liderazgo.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Liderazgo
                    </h1>
                    <p class="text-sm text-gray-500">
                        Nuestra finalidad es llevar el poder del liderazgo y el desarrollo personal a la comunidad de Chilpancingo, Guerrero.
                    </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/Asesorias.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Asesorias
                    </h1>
                    <p class="text-sm text-gray-500">
                        Necesitas ayuda para aprender algún tema.
                    </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/blog.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Blog
                    </h1>
                    <p class="text-sm text-gray-500">
                        Encuentra articulos y manuales para alcanzar tu máximo potencial.
                    </p>
                </header>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">
            ¿No sabes que curso llevar?
        </h1>
        <p class="text-center text-white">
            Dirigete a la sección de cursos y encuentra el curso que más te interese.
        </p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="btn btn-red">
                Catalogo de Cursos
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">Ultimos Cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">
            Contribuir al bienestar y la confianza: entre nuestro equipo de trabajo y la comunidad en general.
        </p>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>
