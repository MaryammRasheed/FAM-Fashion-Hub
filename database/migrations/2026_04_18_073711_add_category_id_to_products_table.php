<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Check if column already exists before adding
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->nullable()->after('vendor_id')->constrained()->nullOnDelete();
            }

            // Also add other missing columns if needed
            if (!Schema::hasColumn('products', 'sale_price')) {
                $table->decimal('sale_price', 10, 2)->nullable()->after('price');
            }

            if (!Schema::hasColumn('products', 'images')) {
                $table->json('images')->nullable()->after('stock');
            }

            if (!Schema::hasColumn('products', 'sizes')) {
                $table->json('sizes')->nullable()->after('images');
            }

            if (!Schema::hasColumn('products', 'colors')) {
                $table->json('colors')->nullable()->after('sizes');
            }

            if (!Schema::hasColumn('products', 'featured')) {
                $table->boolean('featured')->default(false)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('sale_price');
            $table->dropColumn('images');
            $table->dropColumn('sizes');
            $table->dropColumn('colors');
            $table->dropColumn('featured');
        });
    }
};
