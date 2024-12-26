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
        // Clear table data
        DB::table('job_listings')->truncate();

        Schema::table('job_listings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            $table->integer('salary');
            $table->string('tags')->nullable();
            $table->enum('job_type', [
                'Full-Time',
                'Part-Time',
                'Contract',
                'Temporary',
                'Internship',
                'Volunteer',
                'On-Call'
            ])->default('Full-Time');
            $table->boolean('remote')->default(false);
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->text('address')->nullable();
            $table->text('city');
            $table->text('state');
            $table->text('zipcode')->nullable();
            $table->text('contact_email');
            $table->text('contact_phone')->nullable();
            $table->text('company_name');
            $table->text('company_description')->nullable();
            $table->text('company_logo')->nullable();
            $table->text('company_website')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            
            $table->dropColumn([
                'salary',
                'tags',
                'job_type',
                'remote',
                'requirements',
                'benefits',
                'address',
                'city',
                'state',
                'zipcode',
                'contact_email',
                'contact_phone',
                'company_name',
                'company_description',
                'company_logo',
                'company_website'
            ]);
        });
    }
};
