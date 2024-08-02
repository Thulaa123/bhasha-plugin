<?php namespace Bhasha\Xinstitute\Components;

use Cms\Classes\ComponentBase;
// Models
use Bhasha\Xinstitute\Models\Course;

class CourseInfo extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Course list',
            'description' => 'To Get Course details'
        ];
    }
    // Get All Country list
    public function getInfo() {
        $courses = Course::all();
        return $courses;
    }
}