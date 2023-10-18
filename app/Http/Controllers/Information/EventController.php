<?php

namespace App\Http\Controllers\Information;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
    {
        $event=Event::all()->get();

        return view('admin.pages.event.index-event', ['event'=>$event]);
    }

    public function create()
    {
        return view('admin.pages.event.create-event');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_event'=>'required',
            'description'=>'required',
            'date'=>'required',
            'place'=>'required',
        ]);

        $event=Event::create([
            'title_event'=>$request->title_event,
            'description'=>$request->description,
            'date'=>$request->date,
            'place'=>$request->place,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('event.index');
    }

    public function edit(Event $event)
    {
        return view('admin.pages.event.edit-event', ['event'=>$event]);
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title_event'=>'required',
            'description'=>'required',
            'date'=>'required',
            'place'=>'required',
        ]);

        $event->update([
            'title_event'=>$request->title_event,
            'description'=>$request->description,
            'date'=>$request->date,
            'place'=>$request->place,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('event.index');
    }

    public function destroy(Event $event)
    {
        $event=Event::where('id', $event->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('event.index');
    }
}
