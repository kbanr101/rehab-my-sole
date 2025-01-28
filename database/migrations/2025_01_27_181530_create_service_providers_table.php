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
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id('provider_id'); // Primary key, auto-increment
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->string('expertise');
            $table->text('certifications')->nullable();
            $table->json('pricing');
            $table->json('operational_hours');
            $table->enum('availability_status', ['Active', 'Inactive'])->default('Active');
            $table->decimal('average_rating', 3, 2)->default(0);
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
        Schema::dropIfExists('service_providers');
    }
};
