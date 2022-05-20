<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //Insert some data
        DB::table('teachers')->insert(
            array(
                'name' => 'Katie'
            )
        );

        DB::table('teachers')->insert(
            array(
                'name' => 'Max'
            )
        );

        DB::table('teachers')->insert(
            array(
                'name' => 'Maria'
            )
        );

        DB::table('teachers')->insert(
            array(
                'name' => 'Adam'
            )
        );

        DB::table('teachers')->insert(
            array(
                'name' => 'Williams'
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
