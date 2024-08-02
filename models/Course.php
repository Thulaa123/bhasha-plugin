<?php namespace Bhasha\Xinstitute\Models;

use Model;

/**
 * Model
 */
class Course extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'bhasha_xinstitute_courses';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'name' => 'required',
        'department' => 'required',
        'fee' => 'required',
    ];

    public $hasMany = [
        'student' => Student::class,
    ];

}
