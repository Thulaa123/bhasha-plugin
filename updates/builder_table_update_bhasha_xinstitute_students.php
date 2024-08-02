<?php namespace Bhasha\Xinstitute\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBhashaXinstituteStudents extends Migration
{
    public function up()
    {
        Schema::table('bhasha_xinstitute_students', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('bhasha_xinstitute_students', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
