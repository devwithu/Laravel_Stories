<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:stats {user?} {--s|Sort=id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Stats of the system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$count = User::count();
        //$this->info('Generate Stat Command was run');
        //$this->info('There are a total of ' . $count . ' users');

        //$users = User::select(['name', 'email'])->withCount('stories')->get()->toArray();

        $users = $this->getUsers();
        $this->table(['Name', 'Enamil', 'Stories Coiunt'], $users);
    }

    protected function getUsers()
    {
        $userId = $this->argument('user');

        $users = User::select(['name', 'email'])->withCount('stories');
        if (!is_null($userId)) {
            $users->where('id', $userId);
        }

        $sortBy = $this->option('Sort');
        if( !in_array($sortBy, ['id', 'name', 'email', 'stories_count']) ) {
            $sortBy = 'id';
        }

        $users = $users->orderBy($sortBy)->get()->toArray();
        return $users;
    }
}
