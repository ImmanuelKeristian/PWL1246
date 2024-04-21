<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'courseselection';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idcourseSelection',
        'idUser',
        'idCourse',
    ];
    
    public function course()
    {
        return $this->belongsTo(Matkul::class, 'idCourse');
    }

    public function akun()
    {
        return $this->belongsTo(User::class, 'id');
    }

    protected $primaryKey = 'idcourseSelection';
}
