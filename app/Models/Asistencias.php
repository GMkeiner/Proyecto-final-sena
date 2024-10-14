<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Ficha;

class Asistencias extends Model
{
    protected $fillable = ['ficha_id', 'asistieron', 'no_asistieron', 'evento'];

    public function ficha(): BelongsTo
    {
        return $this->belongsTo(Ficha::class);
    }

    protected function asistieron(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value, true) ?? [], 
            set: fn ($value) => is_array($value) ? json_encode($value) : throw new \InvalidArgumentException('El valor debe ser un array.')
        );
    }

    protected function noAsistieron(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value, true) ?? [], 
            set: fn ($value) => is_array($value) ? json_encode($value) : throw new \InvalidArgumentException('El valor debe ser un array.')
        );
    }

    protected function evento(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value, true) ?? [], 
            set: fn ($value) => is_array($value) ? json_encode($value) : throw new \InvalidArgumentException('El valor debe ser un array.')
        );
    }
}



//LUIS , JUAN ESTE CODIGO FUE EL QUE HISO LUIS EL DE ARRIBA ES PARECIDO SOLO QUE TIENE ALGUNOS CAMBIOS 

// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Casts\Attribute;
// use App\Models\Ficha;

// class Asistencias extends Model
// {
//     protected $fillable = ['ficha_id', 'asistieron', 'no_asistieron', 'evento'];

//     public function ficha(): BelongsTo{
//         return $this->belongsTo(Ficha::class);
//     }
    
//     protected function asistieron(): Attribute{
//         return Attribute::make(
//             get: fn (mixed $value) => json_decode($value,true),
//             set: fn (array $value) => json_encode($value)
//         );
//     }
//     protected function noAsistieron(): Attribute{
//         return Attribute::make(
//             get: fn (mixed $value) => json_decode($value,true),
//             set: fn (array $value) => json_encode($value)
//         );
//     }
//     protected function evento(): Attribute{
//         return Attribute::make(
//             get: fn (mixed $value) => json_decode($value,true),
//             set: fn (array $value) => json_encode($value)
//         );
//     }
// }