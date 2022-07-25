<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EventController extends Controller
{

    public function index(): void
    {
//        echo view('events');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date_format:Y-m-d'
        ]);

        echo view('pages.events.form', [
            'date' => $validated['date']
        ]);
    }

    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'done' => 'boolean'
        ]);

        Event::create([
            'name' => $validated['name'],
            'date' => $validated['date']
        ]);

        return redirect('/');
    }

    public function show(Event $event)
    {
        echo view('pages.events.form', $event);
    }

    public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'done' => 'boolean'
        ]);

        if ($event->update($validated)) {
            return redirect('/');
        }
    }

    public function destroy(Event $event): JsonResponse
    {
        $response = [
            'success' => false
        ];

        if ($event->delete()) {
            $response['success'] = true;
        }

        return response()->json($response);
    }
}
