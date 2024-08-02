<?php namespace Bhasha\Xinstitute\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBhashaXinstituteStudents extends Migration
{
    public function up()
    {
        Schema::create('bhasha_xinstitute_students', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->text('address');
            $table->string('contact_number');
            $table->integer('course_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bhasha_xinstitute_students');
    }
}
