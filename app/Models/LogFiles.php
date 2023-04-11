<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LogFiles extends Model
{

    protected $fillable = [
        'name',
    ];

    public function checkCsv(String $fileName): bool
    {
        $countCsv = LogFiles::query()->where('name',$fileName)->count();
        return $countCsv > 0;
    }
}
