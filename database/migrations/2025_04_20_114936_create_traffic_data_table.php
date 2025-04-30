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
    Schema::create('traffic_data', function (Blueprint $table) {
        $table->id();
        $table->integer('visits')->default(0); // إجمالي الزيارات
        $table->integer('bounce_rate')->default(0); // معدل الارتداد
        $table->integer('unique_visitors')->default(0); // عدد الزوار الفريدين
        $table->integer('targeted_visitors')->default(0); // عدد الزوار المستهدفين
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('traffic_data');
}

};
