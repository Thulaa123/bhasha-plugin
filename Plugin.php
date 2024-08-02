<?php namespace Bhasha\Xinstitute;

use DB;
use Event;
use Flash;
use Validator;
use ValidationException;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use System\Classes\PluginBase;
use RainLab\User\Facades\Auth;
// Controllers
use Rainlab\User\Controllers\Users as UsersController;

// Models
use Rainlab\User\Models\User as UserModel;
use Bhasha\Xinstitute\Models\Student;

//Components
use Bhasha\Xinstitute\Components\CourseInfo;
use Bhasha\Xinstitute\Components\AuthUserData;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        // Check validation before registing the user and the model
        Event::listen('rainlab.user.beforeRegister', function($data) {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required',
                'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
                'course_id' => 'required',
                'address' => 'required',
                'username' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required',
                'agree' => 'required',
            ];
            $validator = Validator::make($data, $rules);
            if($validator->fails()){
                throw new ValidationException($validator);
            }
        });
        //Register the user to the user's respected Model
        Event::listen('rainlab.user.register', function($user,$data) {
            $student = new Student();
            $student->first_name = $data['first_name'];
            $student->last_name = $data['last_name'];
            $student->birthday = $data['birthday'];
            $student->contact_number = $data['contact_number'];
            $student->address = $data['address'];
            $student->course_id = $data['course_id'];
            $student->created_at = Carbon::now();
            $student->updated_at = Carbon::now();
            $student->save();
            //Saves The model data to its respective User entry
            $authUserRT = UserModel::where('id','=',$user['id'])->first();
            $authUserRT->student_id = $student->id;
            $authUserRT->save();
            Flash::success('You have successfully created your account');
        });
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        {
            return [
                CourseInfo::class => 'courseInfo',
                AuthUserData::class => 'authUserData',
            ];
        }
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
