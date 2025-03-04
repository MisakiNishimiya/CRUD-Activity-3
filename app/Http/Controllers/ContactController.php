<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
/**
     * Display a listing of the contacts.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new contact.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'workphone' => 'nullable|string|max:20',
            'homephone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:contacts',
        ]);

        Contact::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'workphone' => $request->workphone,
            'homephone' => $request->homephone,
            'email' => $request->email,
            'created_by_id' => Auth::id(),
            'created_date' => now(),
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified contact.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'workphone' => 'nullable|string|max:20',
            'homephone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'workphone' => $request->workphone,
            'homephone' => $request->homephone,
            'email' => $request->email,
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }
    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
