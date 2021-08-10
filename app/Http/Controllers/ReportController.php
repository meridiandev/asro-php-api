<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\User;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Возвращаем все данные
        return Report::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        $user = User::find(2);

        $rules = [
            //'full_name' => 'required',
            'event_form'=> 'required',   
            'event_level'=> 'required',  
            'event_date'=> 'required',     
            'event_full_name'=> 'required',  
            'event_hours'=> 'required',  
            'event_document'=> 'required', 
            'event_who'=> 'required', 
            'event_number'=> 'required'
        ];

        $messages = [
            //'full_name' => 'required',
            'event_form.required'=> 'Выберите из списка форму мероприятия',   
            'event_level.required'=> 'Выберите из списка уровень мероприятия',  
            'event_date.required'=> 'Введите дату проведения мероприятия',     
            'event_full_name.required'=> 'Полное название мероприятия',  
            'event_hours.required'=> 'Количество часов',  
            'event_document.required'=> 'Выберите из списка документ, подтверждаюший участие', 
            'event_who.required'=> 'Укажите кто выдал документ', 
            'event_number.required'=> 'Укажите № документа'
        ];

        $report = new Report([
            'event_form' => $request->get('event_form'),
            'event_level' => $request->get('event_level'),
            'event_date' => $request->get('event_date'),
            'event_full_name' => $request->get('event_full_name'),
            'event_hours' => $request->get('event_hours'),
            'event_document' => $request->get('event_document'),
            'event_who' => $request->get('event_who'),
            'event_number' => $request->get('event_number'),
        ]);

        $this->validate($request, $rules, $messages);

        $user->reports()->save($report);

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Report::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        $report->update($request->all());

        return $report;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Report::destroy($id);
    }

     /**
     * Search for full_name
     *
     * @param  str  $full_name
     * @return \Illuminate\Http\Response
     */
    public function search($full_name)
    {
        return Report::where('full_name', 'like', '%' . $full_name . '%')->get();
    }
}