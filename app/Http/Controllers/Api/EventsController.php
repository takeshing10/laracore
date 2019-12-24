<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$events = Event::all();
		return $events;
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
		$event = new Event;
		$event->event_name = $request->event_name;
		$event->user_id = $request->user_id;
		$event->hash = $request->hash;
		$event->start_at = $request->start_at;
		$event->end_at = $request->end_at;
		$event->save();
		return redirect('api/events');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$event = Event::find($id);
		return $event;
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
		$event = Event::find($id);
		$event->event_name = $request->event_name;
		$event->hash = $request->hash;
		$event->save();
		return redirect("api/events/".$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$event = Event::find($id);
		$event->delete();
		return redirect('api/events');
	}
}
