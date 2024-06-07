<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;

class CourseIndex extends Component
{
    use WithPagination;

    public $category_id;
    public $level_id;

    public function mount()
    {
        $this->category_id = null;
        $this->level_id = null;
    }

    public function updatedCategoryId($value)
    {
        $this->category_id = $value;
        $this->resetPage();
    }

    public function updatedLevelId($value)
    {
        $this->level_id = $value;
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $coursesQuery = Course::where('status', 3);

        if ($this->category_id) {
            $coursesQuery->where('category_id', $this->category_id);
        }

        if ($this->level_id) {
            $coursesQuery->where('level_id', $this->level_id);
        }

        $courses = $coursesQuery->latest('id')->paginate(8);

        return view('livewire.course-index', compact('courses', 'categories', 'levels'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id']);
    }
}
