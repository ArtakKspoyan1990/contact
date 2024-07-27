<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\URL;

class CompanyUser extends Authenticatable
{

    use HasFactory;


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
}
