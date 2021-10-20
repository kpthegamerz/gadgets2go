<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AterTableShippings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shippings', function (Blueprint $table) {
            $table->decimal('medium')->nullable();
            $table->decimal('large')->nullable();
            $table->decimal('xlarge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shippings', function (Blueprint $table) {
            $table->dropColumn('medium')->nullable();
            $table->dropColumn('large')->nullable();
            $table->dropColumn('xlarge')->nullable();
        });
    }
}
