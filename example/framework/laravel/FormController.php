<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a form and its output read from the session.
     */
    public function index()
    {
        return view('form', [
            'action' => url('/form/process')
        ]);
    }

    /**
     * Process the posted form and store its message in the session.
     */
    public function process(Request $request)
    {
        $message = $request->input('message');
        return redirect('/form/view')->with('message', $message);
    }

    /**
     * View the result.
     */
    public function view()
    {
        return view('form-view');
    }
}
