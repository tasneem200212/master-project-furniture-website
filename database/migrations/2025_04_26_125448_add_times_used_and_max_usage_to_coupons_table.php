<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->integer('times_used')->default(0);
            $table->integer('max_usage')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('times_used');
            $table->dropColumn('max_usage');
        });
    }
    
};
