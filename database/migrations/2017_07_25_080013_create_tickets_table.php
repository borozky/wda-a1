<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string("email");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("operating_system")->nullable();
            $table->string("software_issue")->nullable();
            $table->longText("details");
            
            $table->enum("status", ["Pending", "In Progress", "Unresolved", "Resolved"])->default("Pending");
            
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
