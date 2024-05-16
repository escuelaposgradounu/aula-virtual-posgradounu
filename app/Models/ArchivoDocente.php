<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArchivoDocente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'archivo_docente';
    protected $primaryKey = 'id_archivo_docente';
    protected $fillable = [
        'id_archivo_docente',
        'archivo_docente',
        'id_trabajo_academico',
    ];

    public function trabajoAcademico()
    {
        return $this->belongsTo(TrabajoAcademico::class, 'id_trabajo_academico');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($archivo_docente) {
            $archivo_docente->created_by = auth()->id();
        });
        static::updating(function ($archivo_docente) {
            $archivo_docente->updated_by = auth()->id();
        });
        static::deleting(function ($archivo_docente) {
            $archivo_docente->deleted_by = auth()->id();
            $archivo_docente->save();
        });
    }
}
