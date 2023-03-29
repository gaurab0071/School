<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateStudentGrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:student-grades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the grade column of all students to 5.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('students')->update(['grade' => 5]);
        $this->info('Updated the grade column of all students to 5.');
        return 0;
    }
}
