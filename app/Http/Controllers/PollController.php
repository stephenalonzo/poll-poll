<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function show(Poll $poll)
    {
        return view('poll.show', [
            'poll' => $poll
        ]);
    }

    public function store(PollRequest $request)
    {
        $validated = $request->validated();

        // dd($validated);
        $validated['poll_uid'] = bin2hex(random_bytes(4));
        Poll::create($validated);
    }
}
