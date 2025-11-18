<?php

namespace App\Livewire\Career;

use App\Enums\CareerEnum;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
class ShowStudents extends Component
{

    use WithPagination;
    public int $career_id = 2;
    public function mount($career_id) {
        $this->career_id = $career_id;
    }
    public function render()
    {
        $students = Student::where("career_id", $this->career_id)->paginate(10);

        return view('livewire.career.show-students',
        ['students' => $students]);
    }
}
