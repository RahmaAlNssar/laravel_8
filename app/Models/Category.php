<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name','image','parent_id','status'];


    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function childrens(){
        return $this->hasMany(Category::class);
    }

    public function getImageUrlAttribute()
    {
        if(! $this->image){
            return asset('storage/images/default.png');
        }
        return asset('storage/images/categories/' . $this->image);
       
    } // return image path
    public function status(){
        return $this->status == 1
            ? '<a href="' . route('admin.categories.status', $this->id) . '"class="btn btn-success btn-sm visibility-toggle"> <span class="badge bg-success">'.__('dashboard.visible').'</span></a>'
            : '<a href="' . route('admin.categories.status', $this->id) . '"class="btn btn-danger btn-sm visibility-toggle">  <span class="badge bg-danger"> '.__('dashboard.hidden').'</span></a>';
    }
}