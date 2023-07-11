<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;

class Polls extends Component
{

    protected $listeners = [
        'pollCreated' =>'render', // refresh the page when a new poll is created or updated
    ];

    public function render()
    {
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }


}
