<?php

namespace App\Models\Glossary;

use App\Sorts\BankSort;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes, HasSort, HasSearch;

    public
        $timestamps = false,
        $incrementing = false,
        $search_columns = ['code', 'ru_code', 'name'];

    protected
        $table = 'glossary__banks',
        $primaryKey = 'code',
        $guarded = [];

    public function contract(){
        return $this->belongsTo(Contract::class, 'code', 'bank_code');
    }
}
