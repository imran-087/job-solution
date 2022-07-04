<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'password',
    ];

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
    ];

    // define realtion 
    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function career_info()
    {
        return $this->hasOne(UserCareerInfo::class);
    }

    public function academic_infos()
    {
        return $this->hasMany(UserAcademicInfo::class);
    }

    public function experiences()
    {
        return $this->hasMany(UserExperience::class);
    }

    public function language_proficencies()
    {
        return $this->hasMany(UserLanguageProficency::class);
    }

    public function professional_certificates()
    {
        return $this->hasMany(UserProfessionalCertificate::class);
    }

    public function references()
    {
        return $this->hasMany(UserReference::class);
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function training_infos()
    {
        return $this->hasMany(UserTrainingInfo::class);
    }
}
