<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',   
        'event_form',   //  Форма мероприятия
                                        //  0 - семинары
                                        //  1 - научно-практические семинары
                                        //  2 - методические объединения
                                        //  3 - вебинары
        'event_level',  //  уровень
                                        //  0 - учреждение
                                        //  1 - районый
                                        //  2 - городской
                                        //  3 - областной
                                        //  4 - всероссийский
        'event_date',     //  дата проведения
        'event_full_name',  // Полное название мероприятия
        'event_hours',  // количество часов
        'event_document', //  документ, подтверждаюший участие
                                          //  0 - нет
                                          //  1 - Да
        'event_who', // кто выдал документ
        'event_number', // № документа
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
