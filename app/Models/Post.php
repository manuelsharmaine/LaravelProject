<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;


    // protected $table = 'tbl_posts';
    // protected $primaryKey = 'post_id';

    protected $fillable = ['title','description']; //mass assignment 
    protected $guarded = ['photo'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
