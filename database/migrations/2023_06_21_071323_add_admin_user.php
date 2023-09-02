<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        User::query()->firstOrCreate([
            'email' => 'admin@admin.com'
        ],[
            'name' => "Super Admin",
            'password' => bcrypt('admin@admin.com')
        ]);
    }

};
