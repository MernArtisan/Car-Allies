<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->string('page_name')->after('description')->nullable();
            $table->string('sub_name')->after('page_name')->nullable();

            $table->string('item_1')->after('sub_name')->nullable();
            $table->text('description_1')->after('item_1')->nullable();

            $table->string('item_2')->after('description_1')->nullable();
            $table->text('description_2')->after('item_2')->nullable();

            $table->string('item_3')->after('description_2')->nullable();
            $table->text('description_3')->after('item_3')->nullable();

            $table->string('item_4')->after('description_3')->nullable();
            $table->text('description_4')->after('item_4')->nullable();

            $table->string('item_5')->after('description_4')->nullable();
            $table->text('description_5')->after('item_5')->nullable();

            $table->json('images')->after('description_5')->nullable();
            $table->string('video')->after('images')->nullable();

            $table->integer('count_1')->after('video')->nullable();
            $table->integer('count_2')->after('count_1')->nullable();
            $table->integer('count_3')->after('count_2')->nullable();
        });
    }

    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name',
                'sub_name',
                'item_1',
                'description_1',
                'item_2',
                'description_2',
                'item_3',
                'description_3',
                'item_4',
                'description_4',
                'item_5',
                'description_5',
                'images',
                'video',
                'count_1',
                'count_2',
                'count_3'
            ]);
        });
    }
};
