<?php

namespace App\Livewire;

use App\Models\PostinganMagang;
use Livewire\Component;

class JobPostings extends Component
{
    public $showAll = false;

    public function toggleShowAll()
    {
        $this->showAll = !$this->showAll;
    }

    public function render()
    {
        // Get all postings ordered by latest
        $allPostings = PostinganMagang::with('spesialisasi')->latest()->get();

        // Show only 3 if not showing all, else show all
        $postings = $this->showAll ? $allPostings : $allPostings->take(3);

        return view('livewire.job-postings', compact('postings', 'allPostings'));
    }
}
