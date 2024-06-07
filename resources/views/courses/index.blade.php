<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/cup.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">
                    Los mejores cursos estan en: CreArte
                </h1>
                <p class="text-white text-lg mt-2">
                    En CreArte encontrarás los mejores cursos que te ayudaran a convertirte en todo un profesional
                </p>
                
            </div>
        </div>
    </section>

    @livewire('course-index')
</x-app-layout>