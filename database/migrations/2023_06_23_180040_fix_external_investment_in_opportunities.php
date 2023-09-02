<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('external_investments');
        });

        Schema::table('opportunities', function (Blueprint $table) {
            $table->float('external_investments')->nullable();
        });
    }

};
