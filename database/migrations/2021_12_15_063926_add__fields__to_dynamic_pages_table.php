<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDynamicPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dynamic_pages', function (Blueprint $table) {
            $table->string('title2')->nullable()->after('description');
            $table->string('dec2')->nullable()->after('title2');
            $table->string('title3')->nullable()->after('dec2');
            $table->string('desc3')->nullable()->after('title3');
            $table->string('address')->nullable()->after('desc3');
            $table->string('email')->nullable()->after('address');
            $table->string('phone_number')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dynamic_pages', function (Blueprint $table) {
            //
        });
    }
}
