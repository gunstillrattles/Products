<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAuthorizationTable extends Migration
{
    public function up()
    {
        Schema::create('authorization', function (Blueprint $table) {
            $table->bigIncrements('userId');
            $table->string('login');
            $table->string('password');
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('authorization');
    }
}
