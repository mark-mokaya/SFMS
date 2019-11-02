<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'first_name', 'last_name', 'username', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }