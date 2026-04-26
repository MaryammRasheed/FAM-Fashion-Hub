<?php
// database/migrations/xxxx_add_fields_to_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'description'))
                $table->text('description')->nullable()->after('name');
            if (!Schema::hasColumn('products', 'price'))
                $table->decimal('price', 10, 2)->default(0)->after('description');
            if (!Schema::hasColumn('products', 'stock'))
                $table->integer('stock')->default(0)->after('price');
            if (!Schema::hasColumn('products', 'image'))
                $table->string('image')->nullable()->after('stock');
            if (!Schema::hasColumn('products', 'status'))
                $table->enum('status', ['active','pending','inactive'])->default('pending')->after('image');
            if (!Schema::hasColumn('products', 'category_id'))
                $table->foreignId('category_id')->nullable()->constrained()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['description','price','stock','image','status','category_id']);
        });
    }
};