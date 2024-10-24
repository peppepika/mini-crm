<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, SoftDeletes;

        protected $fillable = [
            'title',
            'description',
            'user_id',
            'project_id',
            'client_id',
            'deadline_at',
            'status'
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
        public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function casts()
    {
        return [
            'status' => TaskStatus::class,
        ];
    }
}
