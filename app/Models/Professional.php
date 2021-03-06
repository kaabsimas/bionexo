<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'crm', 'phone'];

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }
}
