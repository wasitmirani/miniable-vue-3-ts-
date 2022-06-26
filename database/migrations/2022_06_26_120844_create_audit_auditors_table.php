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
        Schema::create('audit_auditors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->nullable()->default(1)->constrained('audit_auditor_statuses');
            $table->foreignId('audit_id')->nullable()->constrained('audits');
            $table->foreignId('auditor_id')->nullable()->constrained('auditors');
            $table->boolean('finished')->default(0);
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
        Schema::dropIfExists('audit_auditors');
    }
};
