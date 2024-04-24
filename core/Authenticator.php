<?php

namespace Core;

use App\Models\User;

class Authenticator
{
    /**
     * @return bool
     * @param  mixed $email
     * @param  mixed $password
     */
    public function attempt($email, $password): bool
    {
        $user = User::where('email', '=', $email)->get();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login(
                    [
                        'email' => $user['email'],
                    ]
                );

                return true;
            }
        }

        return false;
    }

    /**
     * @return void
     * @param  mixed $user
     */
    public function login($user): void
    {
        if ($user) {
            $_SESSION['user'] = [
                'email' => $user['email'],
                'role' => $user['role'],
            ];
        }

        session_regenerate_id(true);
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Session::destroy();
    }
}
