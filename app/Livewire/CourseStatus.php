<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{

    use AuthorizesRequests;

    public $course;

    public function mount(Course $course){
        $this->course = $course;

        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
