<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get About image
     */
    public function getImg()
    {
        if (($this->about_image != null) && (file_exists(public_path('uploads/' . $this->about_image)))) {
            return url('uploads/' . $this->about_image);
        }
        return url('uploads/no_image.jpg');
    }
}
