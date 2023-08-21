<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Jobs\BroadcastMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        auth()->loginUsingId(1);
        return view('layouts.main');
    }

    public function send(Request $request)
    {
        $message = $request->user()->messages()->create($request->validate([
            'text' => 'required|string'
        ]));
        event(new MessageSent($request->user(), $message));
        return $message;
    }

    public function messages(): Collection|array
    {
        return Message::query()
            ->with('user')
            ->get();
    }
}
