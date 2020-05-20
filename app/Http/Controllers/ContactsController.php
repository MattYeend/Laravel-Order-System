<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\ContactRole;
use App\Http\Requests\CreateContact;
use App\Http\Requests\UpdateContact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact(['contacts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new Contact;
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');
        return view('contacts.create', compact(['contact', 'companies', 'contactRoles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContact $request)
    {
        Contact::create($request->all());
        return redirect('contacts')->with('alert', 'Contact created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');
        return view('contacts.edit', compact(['contact', 'companies', 'contactRoles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect('contacts')->with('alert', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
