<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const PRIORITY_HIGH = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_LOW = 3;

    protected $fillable = ['user_id','title','description','status','priority'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityLabel()
    {
        switch ($this->priority) {
            case self::PRIORITY_HIGH:
                return 'High';
            case self::PRIORITY_MEDIUM:
                return 'Medium';
            case self::PRIORITY_LOW:
                return 'Low';
            default:
                return 'N/A';
        }
    }
    
}
