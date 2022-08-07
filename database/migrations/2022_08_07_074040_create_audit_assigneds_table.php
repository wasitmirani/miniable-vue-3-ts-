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
        Schema::create('audit_assigneds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_id')->nullable()->constrained('audits');
            $table->foreignId('auditor_id')->nullable()->constrained('auditors');
            $table->foreignId('audit_date_id')->nullable()->constrained('audit_dates');
            $table->boolean('is_assigned')->default(0);
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
        Schema::dropIfExists('audit_assigneds');
    }
};
