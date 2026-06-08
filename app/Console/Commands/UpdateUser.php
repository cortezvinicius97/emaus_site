<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('user:update {email?} {password?}')]
#[Description('Atualiza email e/ou senha do usuário admin')]
class UpdateUser extends Command
{
    public function handle()
    {
        $user = User::first();

        if (!$user) {
            $this->error('Nenhum usuário encontrado.');
            return 1;
        }

        $email = $this->argument('email');
        $password = $this->argument('password');

        if (!$email && !$password) {
            $email = $this->ask('Novo email (deixe vazio para manter)');
            $password = $this->secret('Nova senha (deixe vazio para manter)');
        }

        if ($email) {
            $user->email = $email;
        }

        if ($password) {
            $user->password = bcrypt($password);
        }

        $user->save();

        $this->info('Usuário atualizado com sucesso!');
        $this->line("Email: {$user->email}");

        return 0;
    }
}
