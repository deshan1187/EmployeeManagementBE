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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email');
            $table->string('phone'); 
            $table->enum('designation', ['Intern', 'Associate', 'Senior', 'Manager']);
            $table->decimal('monthly_salary_package');
            $table->decimal('monthly_tax_value');
            $table->decimal('yearly_increasing_bonus');
            $table->decimal('monthly_net_salary');
            $table->decimal('yearly_net_salary');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
