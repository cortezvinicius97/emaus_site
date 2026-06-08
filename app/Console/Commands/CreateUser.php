<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('user:create {name?} {email?} {password?}')]
#[Description('Cria um novo usuário admin')]
class CreateUser extends Command
{
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        if (!$name) {
            $name = $this->ask('Nome');
        }

        if (!$email) {
            $email = $this->ask('Email');
        }

        if (!$password) {
            $password = $this->secret('Senha');
        }

        if (User::where('email', $email)->exists()) {
            $this->error('Já existe um usuário com este email.');
            return 1;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $this->info("Usuário {$name} criado com sucesso!");

        return 0;
    }
}
