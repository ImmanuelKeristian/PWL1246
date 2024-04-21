<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'course';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idCourse',
        'codeCourse',
        'nameCourse',
        'statusCourse',
        'sks'
    ];

    protected $primaryKey = 'idCourse';
}
