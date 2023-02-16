<?php

use App\Models\Client;
use App\Models\Treatment;
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
        Schema::create('client_treatment', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Treatment::class);
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
        Schema::dropIfExists('client_treatment');
    }
};
