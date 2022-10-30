<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'venue', 'photo'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    function formatDate ($date, $format='d F Y') {
        if ($date !== null){
            return date($format, strtotime($date));
        }
        return '-';
    }
    function getStatus ($status){
        $value = [];
        switch ($status){
            case 'open':
                $value ['label'] = 'Open';
                $value ['class'] = 'badge-success';
                break;
            case 'closed':
                $value['label'] = 'Closed';
                $value ['class'] = 'badge-danger';
                break;
        }
        return $value;
    }
}
