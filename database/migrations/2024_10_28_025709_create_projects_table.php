<?php

use App\Models\JenisProject;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'member_id')->nullable();
            // $table->foreignIdFor(JenisProject::class,'jenis_id')->nullable();
            $table->string('name');
            $table->foreignId('tipe_project_id')->nullable()->constrained('jenis_projects');
            $table->foreignId('client_id')->nullable()->constrained('users');
            $table->date('deadline');
            $table->string('keterangan');
            $table->string('harga');
            $table->enum('status', ['new', 'in_progress', 'close_to_due', 'completed']) 
            ->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
