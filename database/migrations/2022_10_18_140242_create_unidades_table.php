<?php
     
     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;
      
     class CreateUnidadesTable extends Migration
     {
         /**
          * Run the migrations.
          *
          * @return void
          */
          public function up()
          {
              // cria, primeiro, a tabela unidades
              Schema::create('unidades', function (Blueprint $table) {
                  $table->id();
                  $table->string('unidade', 5); //cm, mm, kg
                  $table->string('descricao', 30);
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
             //remover o relacionamento com a tabela produto_detalhes
           
      
             Schema::dropIfExists('unidades');
         }
     }