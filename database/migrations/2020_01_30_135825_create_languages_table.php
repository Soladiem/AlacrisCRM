<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateLanguagesTable extends Migration
    {
        /**
         * Run the migrations.
         * @return void
         */
        public function up()
        {
            Schema::create('languages', function (Blueprint $table) {
                $table->increments('id');
                $table->char('iso_code', 2)->index();
                $table->string('code', 10)->index();
                $table->string('name', 40);
                $table->string('name_native', 50);
                $table
                    ->enum('text_direction', ['ltr', 'rtl'])
                    ->default('ltr');
                $table->string('date_format', 10);
                $table->boolean('status')->default(true);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('languages');
        }
    }
