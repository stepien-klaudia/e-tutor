<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_levels', function (Blueprint $table) {
            $table->id();
            $table -> string('name',255);
            $table->timestamps();
        });
        Schema::table('announcements', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id')->nullable()->after('category_id')->nullable();
            $table->foreign('level_id')->references('id')->on('announcement_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropForeign('announcements_level_id_foreign');
            $table->dropColumn('level_id');
        });
        Schema::dropIfExists('announcement_levels');
    }
}
