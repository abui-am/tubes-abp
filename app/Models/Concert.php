<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Concert extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'concerts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'artists',
        'date',
        'city',
        'venue',
        'venue_address',
        'ticket_price_in_rupiah',
        'videoURL',
        'imageURL',
        'additional_information',
        'description',
    ];
}
