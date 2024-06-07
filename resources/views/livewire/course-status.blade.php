<div class="mt-8">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-3 gap-8">
        <div class="col-span-2">

        </div>
        <div class="bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-4">
                <h1> {{$course->title}} </h1>
                <div class="flex items-center">
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
