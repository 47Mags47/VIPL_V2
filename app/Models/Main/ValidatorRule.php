<?php

namespace App\Models\Main;

use App\Models\Glossary\PackageDataColumn;
use App\Models\Glossary\ValidatorType;
use Illuminate\Database\Eloquent\Model;

class ValidatorRule extends Model
{
    public
        $timestamps = false;

    protected
        $table = 'main__validator_rules',
        $guarded = [];

    public function type()
    {
        return $this->belongsTo(ValidatorType::class, 'type_code', 'code');
    }

    public function column()
    {
        return $this->belongsTo(PackageDataColumn::class, 'column_code', 'code');
    }
}
