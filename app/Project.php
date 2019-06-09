<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $guarded = ['id'];

    // protected $dispatchesEvents = [
    //     'created' => \App\Events\ProjectCreated::class
    // ];

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
    	return $this->tasks()->create($task);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
