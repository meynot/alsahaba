<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
			
			$table->unsignedBigInteger('post_id')->nullable()->comment('parent post or previouspage');
			
			$table->string('title');
			$table->string('short')->nullable()->comment('short body to be shown in list or posts');
			$table->text('body')->comment('not related to short, short need to be repeated here as this will be shown without short');
			
			$table->string('language')->default('en');
			
			$table->boolean('is_published')->default(false);
			$table->dateTime('published_at')->nullable();
			
			$table->boolean('is_featured')->default(false);
			$table->boolean('is_pinned')->default(false);
			
			$table->boolean('is_commentable')->default(false);
			
			$table->boolean('has_roles')->default(false);
			$table->boolean('is_editable')->default(false);
			$table->boolean('is_deleteable')->default(false);
			
			$table->unsignedBigInteger('user_id');
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			
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
        Schema::dropIfExists('posts');
    }
};
