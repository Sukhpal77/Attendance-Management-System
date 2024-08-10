<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function showEvent()
    {
        $userrole = auth()->user()->role;
        $now = Carbon::now();
        Event::where('date', '<', $now)->delete();
        $events = Event::all();
        return view('event.event', compact('events','userrole'));
    }

    public function storeEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'place' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $event = Event::create([
                'date' => $request->date,
                'time' => $request->time,
                'place' => $request->place,
                'heading' => $request->heading,
                'description' => $request->description,
            ]);

            return response()->json([
                'message' => 'Event added successfully!',
                'event' => $event,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while adding the event.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
