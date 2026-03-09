<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->enum('role', ['customer', 'vendor', 'admin'])->default('customer')->after('email');
        $table->string('phone')->nullable()->after('role');
        $table->string('address')->nullable()->after('phone');
    });
}

    /**
     * Reverse the migrations.
     */
  public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['role', 'phone', 'address']);
    });
}
};
