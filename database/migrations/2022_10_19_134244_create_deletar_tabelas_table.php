<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletarTabelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletar_tabelas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

         // depois, adiciona o relacionamento com a tabela produtos
         Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
     
     
        // e, por último, adiciona o relacionamento com a tabela produto_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos_detalhes', function(Blueprint $table) {
            //remover a fk
            $table->dropForeign('produtos_detalhes_unidade_id_foreign'); //[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
 
        //remover o relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            //remover a fk
            $table->dropForeign('produtos_unidade_id_foreign'); //[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
        Schema::dropIfExists('deletar_tabelas');
    }
}
