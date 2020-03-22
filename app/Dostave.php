<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dostave extends Model
{
    use SoftDeletes;

    public $table = 'dostaves';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'nova'        => 'nova',
        'prihvacena'  => 'prihvacena',
        'dostavljena' => 'dostavljena',
    ];

    protected $fillable = [
        'name',
        'status',
        'spisak',
        'random',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
        'operater_id',
        'phone_number',
        'dostavljac_id',
        'organization_id',
    ];

    public function organization()
    {
        return $this->belongsTo(User::class, 'organization_id');

    }

    public function operater()
    {
        return $this->belongsTo(User::class, 'operater_id');

    }

    public function dostavljac()
    {
        return $this->belongsTo(User::class, 'dostavljac_id');

    }
}
