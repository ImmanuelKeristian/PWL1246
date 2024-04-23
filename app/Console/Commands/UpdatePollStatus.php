<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Polls;

class UpdatePollStatus extends Command
{
    protected $signature = 'polls:update-status';
    protected $description = 'Update status of polls';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch polls where end time is less than or equal to current time
        $expiredPolls = Polls::where('end_poll', '<=', now())->get();

        // Update status of expired polls to "Closed"
        foreach ($expiredPolls as $poll) {
            $poll->statusPoll = 'Closed';
            $poll->save();
        }

        $this->info('Poll statuses updated successfully.');
    }
}
