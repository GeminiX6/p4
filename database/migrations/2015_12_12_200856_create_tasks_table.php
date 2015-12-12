<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('tasks', function (Blueprint $table) {

           # Increments method will make a Primary, Auto-Incrementing field.
           # Most tables start off this way
           $table->increments('id');

           # This generates two columns: `created_at` and `updated_at` to
           # keep track of changes to a row
           $table->timestamps();

           # The rest of the fields...
           $table->text('description');
           $table->timestamp('due');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
