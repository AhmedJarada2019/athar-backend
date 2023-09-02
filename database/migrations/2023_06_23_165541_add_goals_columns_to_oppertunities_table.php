<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->text('financial_details_ar')->nullable();
            $table->text('features_ar')->nullable();
            $table->text('risks_ar')->nullable();
            $table->text('financial_details_en')->nullable();
            $table->text('features_en')->nullable();
            $table->text('risks_en')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('financial_details_ar');
            $table->dropColumn('features_ar');
            $table->dropColumn('risks_ar');
            $table->dropColumn('financial_details_en');
            $table->dropColumn('features_en');
            $table->dropColumn('risks_en');
        });
    }
};
