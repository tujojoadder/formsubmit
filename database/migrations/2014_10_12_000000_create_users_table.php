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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // পত্রিকা সম্পর্কিত
            $table->string('newspaper_name');         // পত্রিকার নাম
            $table->string('reference_code')->nullable(); // রেফারেন্স কোড (ঐচ্ছিক)

            // ব্যক্তিগত তথ্য
            $table->string('full_name');              // পূর্ণ নাম
            $table->string('email')->unique();        // ইমেইল
            $table->string('phone');                  // মোবাইল
            $table->string('current_address')->nullable();        // বর্তমান ঠিকানা (ঐচ্ছিক)
            $table->string('username')->unique();     // ইউজার নেম
            $table->string('password');               // পাসওয়ার্ড

            // পদের তথ্য
            $table->string('applied_position');       // আবেদনকৃত পদ
            $table->string('working_place');          // কর্মস্থল
            $table->string('education');              // শিক্ষাগত যোগ্যতা
            $table->integer('experience_years')->nullable();      // অভিজ্ঞতা (বছর)

            // অন্যান্য
            $table->string('portfolio_link')->nullable();         // পোর্টফোলিও লিংক
            $table->text('cover_letter')->nullable();
            $table->string('cv')->nullable();    // CV ফাইল path
            $table->string('photo')->nullable(); // Photo ফাইল path
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            // ডিফল্ট ফিল্ড
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};