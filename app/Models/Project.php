<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{

    use HasFactory;
    protected $table = 'projects';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'url',
        'color',
        'reminder',
        'description',
        'start_date',
        'end_date',
        'position',
        'category_id',
        'client_id',
        'manager_id',
        'status',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the brand associated with the user.
     */
     public function category(): HasOne
    {
        return $this->HasOne(ProjectCategory::class, 'id', 'category_id');
    }

    /**
     * Get the brand associated with the user.
     */
     public function manager(): HasOne
    {
        return $this->HasOne(User::class, 'id', 'manager_id');
    }

    /**
     * Get the brand associated with the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the brand associated with the user.
     */
    public function tasks(): HasMany
    {
        return $this->HasMany(ProjectTask::class, 'project_id', 'id');
    }

    /**
     * Get the brand associated with the user.
     */
     public function statuses(): HasMany
    {
        return $this->HasMany(ProjectStatus::class, 'project_id', 'id');
    }

}
