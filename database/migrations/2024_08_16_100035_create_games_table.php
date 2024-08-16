<?php

use App\Models\Competition;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TABLE_NAME = 'games';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $teamsTable = (new Team())->getTable();
            $table->uuid('id')->primary();
            $table->string('name');
            $table->datetime('start');
            $table->text('description')->nullable();
            $table->text('summary')->nullable();
            $table->foreignIdFor(Competition::class)->constrained();
            $table->foreignIdFor(Team::class, 'team_1_id')->constrained($teamsTable);
            $table->foreignIdFor(Team::class, 'team_2_id')->constrained($teamsTable);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
