<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get Portfolio image
     */
    public function getImg()
    {
        if (($this->image != null) && (file_exists(PUBLIC_PATH . 'uploads/portfolios/' . $this->image))) {
            return asset('uploads/portfolios/' . $this->image);
        }
        return asset('frontImg/no_image.jpg');
    }
}
