<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $tickets = Tickets::orderBy('created_at', 'desc')->get();

        return view('admin.ticket.index', compact('tickets'));
    }

    public function create()
    {
        return view('admin.ticket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'tech' => 'required|string|max:255',
        ]);

        Tickets::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'tech' => $request->tech,
        ]);

        return redirect()
            ->route('admin.ticket.index')
            ->with('success', __('Ticket guardado correctamente'));
    }
}
