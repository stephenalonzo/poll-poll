<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Poll;
use App\Models\Result;
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

    public function vote(ResultRequest $request, Poll $poll)
    {
        $poll_id = Poll::where('poll_uid', $poll['poll_uid'])->get('id');
        $validated = $request->validated();

        foreach ($poll_id as $id) {
            Result::create([
                'poll_id' => $id['id'],
                'option' => $validated['option']
            ]);
            return back();
        }
    }
}
