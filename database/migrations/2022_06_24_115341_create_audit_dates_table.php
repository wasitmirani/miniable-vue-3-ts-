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
        Schema::create('audit_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_id')->nullable()->constrained('audits');
            $table->timestamp('audit_date')->nullable();
            $table->foreignId('auditor_assistant')->nullable()->constrained('auditors');
            $table->foreignId('status_id')->nullable()->default(1)->constrained('audit_statuses');
            $table->boolean('finished')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('audit_dates');
    }
};
