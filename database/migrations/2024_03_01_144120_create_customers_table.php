<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); // To store the customer's email address
            $table->string('phone_number')->nullable(); // To store the customer's phone number
            $table->string('gender')->nullable(); // To store the customer's gender
            $table->text('allergies')->nullable(); // To store any known allergies the customer has
            $table->timestamps();
            $table->softDeletes(); // For implementing soft delete functionality
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
