<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Contracts\Services\IssueBookServiceInterface;

class RemindUsers extends Command
{
    /**
     * book issue Service
     */
    private $issueBookService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind to users who have not returned issued books';

    /**
     * Create a new command instance.
     *
     * @param IssueBookServiceInterface $issueBookService
     * @return void
     */
    public function __construct(IssueBookServiceInterface $issueBookService)
    {
        parent::__construct();
        $this->issueBookService = $issueBookService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->issueBookService->sendMailToUsers();
        return 0;
    }
}
