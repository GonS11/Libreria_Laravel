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
        //Sirve para actualizar la tabla si no se puede hacer roollback por la consistencia de datos y FK
        Schema::table('books', function (Blueprint $table) {
            //$table->string('new_column);
            //$table->dropColumn(['column_name','more_columns'])
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Esto es para hacer un roolback es hacer la accion contraria
        //Aqui no tiramos la tabla del up que son en el create, aqui bloqueas el up de modificacion
        //Schema::dropColum(['new_column']);
    }
};
