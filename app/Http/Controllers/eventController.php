<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class eventController extends Controller
{
    public function createEvent(Request $request){
        $event = new Event;
        $event->createEvent($request);
        return response()->json(['Sucesso' => $event]);
    }

    
    
    public function updateEvent(Request $request, $id){
        $event = Event::find($id);
        $event->updateEvent($request);
        return response()->json(['Sucesso' => $event]);
    }

    
    
    public function readEvent (Request $request){
        $event = Event::all();
        return response()->json(['Sucesso' => $event]);
    }
    
    
    public function readEvents (Request $request, $id){
        $event = Event::find($id);
        return response()->json(['Sucesso' => $event]);
    }
    
    
    public function deleteEvent (Request $request, $id){
        Event::destroy($id);
        return response()->json(['Sucesso']);
    }
}
