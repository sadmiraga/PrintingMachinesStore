<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


//manufacturer - string
// model - string
// year -
// stock number - string
// impresions ??  integer
//sheet size  = string
//condition
// description
// number of colors



class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {

            //primary key
            $table->increments('id');

            $table->string('name');

            // machine info
            $table->string('model')->nullable;
            $table->string('manufacturer')->nullable;
            $table->integer('year')->nullable;
            $table->integer('numberOfColors')->nullable;
            $table->string('sheetSize')->nullable;
            $table->string('condition');
            $table->string('stockNumber')->nullable;
            $table->string('serialNumber')->nullable;
            $table->integer('impresions')->nullable;
            $table->integer('price');
            $table->text('description');
            $table->timestamps();

            //image
            $table->string('machineImage');

            //CATEGORY foreign key
            $table->unsignedInteger('categoryID')->unsigned();
            $table->foreign('categoryID')->references('id')->on('categories');

            //SUBCATEGORY foreign key
            $table->integer('subCategoryID')->unsigned()->nullable();
            $table->foreign('subCategoryID')->references('id')->on('sub_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
