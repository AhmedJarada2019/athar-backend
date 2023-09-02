<?php

use Database\Seeders\SettingSeeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->index()->unique();
            $table->string('name');
            $table->string('type');
            $table->string('nova_field');
            $table->string('setting_value');
            $table->timestamps();
        });
        (new SettingSeeder())->run();
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
