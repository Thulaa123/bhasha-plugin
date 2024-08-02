<?php namespace Bhasha\Xinstitute\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddPluginColumns extends Migration
{   

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->integer('student_id')->nullable();
        });
    }

    public function down()
    {
        $table->dropdown([
            'student_id',
        ]);
    }

}