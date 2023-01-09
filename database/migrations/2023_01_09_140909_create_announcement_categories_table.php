<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->timestamps();
        });
        Schema::table('announcements', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('price');
            $table->foreign('category_id')->references('id')->on('announcement_categories');
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
            $table->dropForeign('announcements_category_id_foreign');
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('announcement_categories');
    }
}
