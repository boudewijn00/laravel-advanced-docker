<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('house_number');
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->morphs('addressable');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('userable_type')->nullable()->after('id');
            $table->unsignedBigInteger('userable_id')->nullable()->after('userable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('sellers');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('brands');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('userable_type');
            $table->dropColumn('userable_id');
        });
    }
};
