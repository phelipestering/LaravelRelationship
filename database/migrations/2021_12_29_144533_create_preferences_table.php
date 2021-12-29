<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     * a ligação sera feira sempre na tabela mais fraca, nesse exemplo, criamos a ligaçao para a tabela de user
     *
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); ## chave estrangeira ligando o id do usuario com as preferencias
            ## inserindo as preferencias de usuario
            $table->boolean('notify_emails')->default(true);## receber notificacoes por email
            $table->boolean('notify')->default(true);
            $table->string('background_color');
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
        Schema::dropIfExists('preferences');
    }
}
