<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function create()
    {
        $user = User::all();

        return view('auth.invite')->with('user', $user);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|unique:invitations,email',
        // ]);

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        Mail::to($request->email)->send(new InvitationMail($invitation));

        return redirect()->back()->with('status', 'Invitation sent successfully!');
    }

    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        // Proceed with registration logic
        // e.g., show registration form with email pre-filled

        return view('auth.register', ['email' => $invitation->email]);
    }
}

