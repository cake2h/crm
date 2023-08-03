<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        $user = auth()->user();

        if ($user->username === 'manager1') {
            $clients = Client::where('id', '>', 0)->whereRaw('id % 2 = 0')->orderBy('created_at', 'desc')->get();
        } elseif ($user->username === 'manager2') {
            $clients = Client::where('id', '>', 0)->whereRaw('id % 2 <> 0')->orderBy('created_at', 'desc')->get();
        } else {
            $clients = [];
        }

        return view('home', compact('clients'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->comment = $request->input('comment');
        $client->save();

        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'phone' => ['required', 'string', 'regex:/^(\\+7|7)[0-9]{10}$/'],
            'email' => 'required|email|max:100',
        ]);

        Client::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect('/')->with('success', 'Заявка отправлена');
    }
}
