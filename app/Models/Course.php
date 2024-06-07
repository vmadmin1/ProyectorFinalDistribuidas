<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $withCount = ['students', 'reviews'];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'status',
        'image_path',
        'video_path',
        'welcome_message',
        'goodbye_message',
        'observarion',
        'user_id',
        'level_id',
        'category_id',
        'price_id',
        'published_at',
    ];

    protected $casts = [
        'status' => CourseStatus::class,
        'published_at' => 'datetime',

    ];

    public function getRatingAttribute(){

        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }

    }

    protected function image():Attribute
    {
        return new Attribute(
            get: function(){
                return $this->image_path ? Storage::url($this->image_path) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIWWfFTRYMVjQrrO5EoSVcOQVyhmXCtQAglQ&s';
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Atributo para obtener la URL de la imagen
    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::url($this->image_path) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIWWfFTRYMVjQrrO5EoSVcOQVyhmXCtQAglQ&s';
    }

    //Relaciones
    public function teacher(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }

    //Relacion muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a muchos
    public function goals(){
        return $this->hasMany(Goal::class);
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
}