<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Incorrect username or password. Please try again.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'verification_link_sent' => 'Email verification link has been sent',
    'email_not_verified' => 'Your email address is not verified.',

    'otp' => [
        'invalid' => 'The :attribute is not a valid code.',
        'expired' => 'The :attribute is expired.',
        'max_attempt' => 'The :attribute reached the maximum allowed attempts.',
    ],
];
