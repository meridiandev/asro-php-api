<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            //создание поля для связывания с таблицей user
            $table->unsignedBigInteger('user_id')->unsigned()->default(1);
            //создание внешнего ключа для поля 'user_id', который связан с полем id таблицы 'users'
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('event_form');   //  Форма мероприятия
                                            //  0 - семинары
                                            //  1 - научно-практические семинары
                                            //  2 - методические объединения
                                            //  3 - вебинары
            $table->string('event_level');  //  уровень
                                            //  0 - учреждение
                                            //  1 - районый
                                            //  2 - городской
                                            //  3 - областной
                                            //  4 - всероссийский
            $table->date('event_date');     //  дата проведения
            $table->string('event_full_name');  // Полное название мероприятия
            $table->string('event_hours');  // количество часов
            $table->string('event_document'); //  документ, подтверждаюший участие
                                              //  0 - нет
                                              //  1 - Да
            $table->string('event_who'); // кто выдал документ
            $table->string('event_number'); // № документа
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
        Schema::dropIfExists('reports');
    }
}
