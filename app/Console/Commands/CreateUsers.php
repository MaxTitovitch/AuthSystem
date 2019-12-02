<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use ValidateAuth;
use App\User;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create {username} {email} {phone} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command to create a user through the console interface';

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
     * @return mixed
     */
    public function handle()
    {
        $arguments = $this->getArgumentsAsArray();
        $validator = ValidateAuth::validateUserData($arguments);
        if($validator->fails()){
            $this->showErrors($validator->errors()->all());
        } else {
            $this->create($arguments);
            $this->info('New user created successfully..');
        }
    }

    private function getArgumentsAsArray() {
        $arguments['username'] = $this->argument('username');
        $arguments['email'] = $this->argument('email');
        $arguments['phone'] = $this->argument('phone');
        $arguments['password'] = $this->argument('password'); 

        return $arguments;
    }

    private function showErrors($errors) {
        $id = 0;
        $this->error('Errors in the command:');
        foreach ($errors as $error) {
            $this->error('#' .  $id . ': ' . $error);
        }
    }

    private function create($arguments) {
        return User::create([
            'name' => $arguments['username'],
            'email' => $arguments['email'],
            'phone' => $arguments['phone'],
            'password' => bcrypt($arguments['password']),
        ]);
    }
}
