<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\HasApiTokens;

class CompanyUser extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;


    /**
     * @var string
     */
    protected $guard = 'company_user';


    /**
     * @var string
     */
    protected $table = 'company_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'parent_id',
        'status',
        'password',
        'position'
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
     * @return string
     */
    public function qr()
    {
        $image_path = base_path() . '/public/uploads/companies/qrs/' . $this->id;
        if(is_file($image_path.'/qr.png')) {
            return URL::to('/').'/uploads/companies/qrs/'. $this->id .'/qr.png';
        }
        return URL::to('/').'/assets/img/no_image.jpg';
    }

    /**
     * @return bool
     */
    public function isBigCompany()
    {
        if($this->role == 1) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isCompany()
    {
        if($this->role == 2) {
            return true;
        }
        return false;
    }


    /**
     * @return bool
     */
    public function isIndividual()
    {
        if($this->role == 2) {
            return true;
        }
        return false;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(CompanyUser::class, 'parent_id')->where('role', 2);
    }


    public function employees()
    {
        return $this->hasMany(CompanyUser::class, 'parent_id')->where('role', 3);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(CompanyUser::class, 'parent_id');
    }
}
