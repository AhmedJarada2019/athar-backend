<?php

use Database\Seeders\CountrySeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        (new CountrySeeder())->run();
    }
};
