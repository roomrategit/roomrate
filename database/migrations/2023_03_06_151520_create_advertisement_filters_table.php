<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_filters', function (Blueprint $table) {

            $table->foreignId('advertisement_id')
                ->constrained('advertisements')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('filter_values_id')
                ->constrained('filter_values')
                ->cascadeOnDelete()
                ->cascadeOnUpdate(); 
                
            $table->primary(['advertisement_id', 'filter_values_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement_filters');
    }
}
