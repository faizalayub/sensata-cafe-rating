<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToRatings extends Migration
{
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->string('image')->after('review')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
