<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'disabled' => 'boolean',
        'otp_expiry' => 'datetime',
        'resend_time' => 'datetime',



    ];
    protected $dates = [
        'otp_expiry',
        'resend_time',

    ];
  

    public function isRole($role)
    {
        return $this->role === $role;
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function account() :BelongsTo
    {
        return $this->belongsTo(Account::class,'account_id');
    }

    public function accountList() :HasMany
    {
        return $this->hasMany(Account::class,'user_id');
    }

    public function sendOtpEmail($email, $otp)
    {
        $logPath = 'images/YouPost_Logo.png';
        $details = [           
            'subject' => 'Your OTP for Verification',
            'body' => "Your OTP is: $otp",          
            'logPath' => $logPath,
        ];       
        \Mail::to($email)->send(new \App\Mail\MyOtpMail($details));
    }
    public function markEmailAsVerified()
    {
        $this->forceFill([
            'email_verified_at' => now(),
        ])->save();
    }
}
