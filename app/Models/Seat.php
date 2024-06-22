<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class Seat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'concert_id',
        'seat_no',
        'seat_type',
        'user_id',
        'is_paid',
    ];

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class, 'id', 'concert_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    // Scope to apply filters
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['concert_id'])) {
            $query->where('concert_id', $filters['concert_id']);
        }

        if (isset($filters['seat_type'])) {
            $query->where('seat_type', $filters['seat_type']);
        }

        if (isset($filters['is_paid'])) {
            $query->where('is_paid', $filters['is_paid']);
        }

        if (isset($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

        return $query;
    }
}
