<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafesTable extends Migration
{
    public function up()
    {
        Schema::create('cafes_session', function (Blueprint $table) {
            $table->id();
            $table->string('remark')->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cafes');
    }
}
