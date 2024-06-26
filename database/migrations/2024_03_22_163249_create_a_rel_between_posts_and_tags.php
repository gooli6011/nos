<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateARelBetweenPostsAndTags extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_tag', function (Blueprint $table) {
			$table->id();
			$table->foreignId('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');
			$table->foreignId('tag_id')
				->references('id')
				->on('tags')
				->onDelete('cascade');
			$table->unique(['post_id','tag_id']);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('post_tag');
	}
}
