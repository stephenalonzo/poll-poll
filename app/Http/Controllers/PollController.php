<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Poll;
use App\Models\PollResult;
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

        return redirect('/poll/' . $validated['poll_uid']);
    }

    public function vote(ResultRequest $request, Poll $poll)
    {
        $poll_id = Poll::where('poll_uid', $poll['poll_uid'])->get('id');
        $validated = $request->validated();
        $validated['voter_ip'] = $request->ip();

        foreach ($poll_id as $id) {
            foreach ($validated['option'] as $option) {
                Result::create([
                    'poll_id' => $id['id'],
                    'option' => $option,
                    'voter_ip' => $validated['voter_ip']
                ]);
            }
            return back();
        }
    }

    public function results(Poll $poll)
    {
        if ($poll->poll_resultsVisibility == 1) {
            $result = Result::where('poll_id', $poll->id)->get();
            $totalVotes = $result->count();
            $optionCounts = [];
            foreach ($poll->poll_option as $option) {
                $count = $result->where('option', $option)->count();
                $percentage = $totalVotes > 0 ? round(($count / $totalVotes) * 100, 2) : 0;
                $optionCounts[] = [
                    'option' => $option,
                    'count' => $count,
                    'percentage' => $percentage
                ];
            }
            return view('poll.results', [
                'poll' => $poll,
                'optionCounts' => $optionCounts,
                'totalVotes' => $totalVotes
            ]);
        }

        return back();
    }
}
