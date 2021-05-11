<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Services\ScoreService;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname',
        'name',
        'email',
        'password',
        'provider',
        'provider_user_id',
        'nickname',
        'catchphrase',
        'id_facebook',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'id_facebook',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /**
     * Find user using social provider's id
     *
     * @param string $provider Provider name as requested from oauth e.g. facebook
     * @param string $id User id of social provider
     *
     * @return User
     */
    public static function findForPassportSocialite($provider, $id)
    {
        $account = SocialAccount::where('provider', $provider)->where('provider_user_id', $id)->first();
        if ($account) {
            if ($account->user) {
                return $account->user;
            }
        }
        return;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function getInitialsAttribute()
    {
        return substr(ucfirst($this->first_name), 0, 1) . substr(ucfirst($this->last_name), 0, 1) ;
    }

    public function predictions()
    {
        return $this->hasMany('App\Models\Prediction');
    }

    public function getScoreAttribute()
    {
        $scoreService = new ScoreService();
        return $scoreService->getUserScore($this);
    }
}
