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
        if (($this->image != null) && (file_exists(public_path('uploads/portfolios/' . $this->image)))) {
            return url('uploads/portfolios/' . $this->image);
        }
        return url('uploads/no_image.jpg');
    }
}
