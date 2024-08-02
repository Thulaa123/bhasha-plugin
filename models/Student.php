<?php namespace Bhasha\Xinstitute\Models;

use Model;

/**
 * Model
 */
class Student extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'bhasha_xinstitute_students';

    protected $with = ['courses'];

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'birthday' => 'required',
        'address' => 'required',
        'contact_number' => 'required',
    ];

    public $belongsTo = [
        'courses' => Course::class,
    ];

}
