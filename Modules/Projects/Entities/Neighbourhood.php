<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Neighbourhood extends Model
{
    use SoftDeletes;
    protected $table = "project_neighborhood"; 
    protected $fillable = ['language_id','name','slug','icon'];  
    protected $dates = ['deleted_at']; 
    
    //get all languages
    public function created_language() {
        return $this->belongsTo("Modules\Countries\Entities\Alllanguages","language_id","id");
    }
    
    //get created neighbourhoods based on it's parent id.
    public function types() {
    return $this->hasMany("Modules\Projects\Entities\Neighbourhood","parent_id");
    }
    
}
