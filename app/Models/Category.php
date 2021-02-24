<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Category extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'name_kh',
        'description',
        'abr',
        'number',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getCatCode()
    {
        $number=$this->attributes['number']+1;
        $code=$this->attributes['abr'].$number."/". now()->year;
        $this->update(['number'=>$number]);

        return $code;
    }
}
