<?php namespace Bhasha\Xinstitute\Components;

use Cms\Classes\ComponentBase;
// Packages
use RainLab\User\Facades\Auth;
//Models
use Bhasha\Xinstitute\Models\Student;
use Bhasha\Xinstitute\Models\Course;

class AuthUserData extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Auth Data',
            'description' => 'To get Auth User data with help of the User Model'
        ];
    }
    // Get the current Auth User data
    public function getInfo(){
        return Auth::getUser();
    }
    public function getData(){
        $authData = Auth::getUser();
        $data = Student::find($authData->student_id);
        return $data;
    }
    public function getCourses(){
        $authData = Auth::getUser();
        $studentDetails = Student::find($authData->student_id);
        $data = Course::find($studentDetails->course_id);
        return $data;
    }
}
