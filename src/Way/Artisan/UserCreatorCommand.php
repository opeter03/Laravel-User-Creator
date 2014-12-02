<?php

namespace Way\Artisan;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UserCreatorCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user.';
    protected $creator;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserCreator $creator) {
        parent::__construct();
        
        $this->creator = $creator;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        $fields = $this->getFields();
        //var_dump($fields);
        $this->creator->create($fields);
        
        $this->info('Created user');
        
    }
    
    protected function getFields() {
        $email = $this->argument('email');
        $password = $this->argument('password');
        
        return compact('email', 'password');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return array(
            array('email', InputArgument::REQUIRED, 'Email for a new account.'),
            array('password', InputArgument::REQUIRED, 'Password for a new account.'),
        );
    }

}
