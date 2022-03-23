<?php

use App\Models\Role as ModelsRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('department')->default('NONE');
            $table->string('neptun_code', 6)->default('NONE');
            $table->unsignedInteger('address_id')->default(100);
            $table->unsignedInteger('role_id')->default(100);

            //A külső kulcsok msot nem kellenek, mert it csak ez az egy tábla lesz.

            //$table->foreign('role_id')->references('id')->on('roles');
            //$table->foreign('address_id')->references('id')->on('addresses');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
