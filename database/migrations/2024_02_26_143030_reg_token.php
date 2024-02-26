<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the 'token' column doesn't already exist before adding it
        if (!Schema::hasColumn('users', 'token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('token')->nullable(); // You can set nullable or a default value here if needed
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // You may add logic to revert the changes made in the 'up' method if needed
    }
};