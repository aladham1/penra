<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate();
        return view('events.index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'event' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
         Event::create([
            'title' => $request->event,
            'created_by' => Auth::id()
        ]);
        return response()->json(
            [
                'message' => 'Added successfully',
            ],
            200
        );
    }

    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }
    public function update(Request $request)
    {
        $id = $request->id ?$request->id : \auth()->id();
        $validator = \Validator::make($request->all(), [
            'event' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        Event::findOrFail($id)->update([
            'title' => $request->event
        ]);

        return response()->json(
            [
                'message' => 'Updated successfully',
            ],
            200
        );

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $validator = \Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Please select the event'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        Event::findOrFail($id)->delete();
        return response()->json(
            [
                'message' => 'Deleted',
            ],
            200
        );
    }

}
