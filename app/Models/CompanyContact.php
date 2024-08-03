<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class CompanyContact extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * @return string
     */
    public function logo() {
        $image_name = $this->logo_name;
        $images_path = base_path() . '/public/uploads/company-contact/'. $this->id;

        if($image_name !== null && is_file($images_path .'/'. $image_name)) {
            return URL::to('/').'/uploads/company-contact/'. $this->id .'/'. $image_name;
        } else {
            return URL::to('/').'/img/no/370-300.jpg';
        }
    }

    /**
     * @return string
     */
    public function bg_image() {
        $bg_image_name = $this->bg_img_name;
        $images_path = base_path() . '/public/uploads/company-contact/' . $this->id;
        if ( $bg_image_name !== NULL && is_file($images_path . '/' . $bg_image_name) ) {
            return URL::to('/') . '/uploads/company-contact/' . $this->id . '/' . $bg_image_name;
        }
        else {
            return URL::to('/') . '/img/no/1920-1080.jpg';
        }
    }

    /**
     * @return string
     */
    public function image() {
        $image_name = $this->img_name;
        $images_path = base_path() . '/public/uploads/company-contact/' . $this->id;
        if ( $image_name !== NULL && is_file($images_path . '/' . $image_name) ) {
            return URL::to('/') . '/uploads/company-contact/' . $this->id . '/' . $image_name;
        }
        else {
            return URL::to('/') . '/img/no/370-300.jpg';
        }
    }


}
