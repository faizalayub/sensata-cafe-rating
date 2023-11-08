<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('users', 'employee_id')){
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('employee_id')->after('name')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('users', 'employee_id')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('employee_id');
            });
        }
    }
}
