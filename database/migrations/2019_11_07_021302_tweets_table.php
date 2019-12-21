<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('event_id')->index();
            $table->text('tweet_id')->nullable()->index();

            $table->text('tweet_text')->nullable();
            $table->text('tweet_user_id')->nullable();
            $table->text('tweet_user_name')->nullable();
            $table->text('tweet_user_img')->nullable();

            $table->integer('retweet_count')->nullable();
            $table->integer('favorite_count')->nullable();

            $table->timestamp('tweeted_at')->nullable();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
