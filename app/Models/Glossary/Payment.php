<?php

namespace App\Models\Glossary;

use App\Sorts\PaymentSort;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasSort, HasSearch;

    public
        $timestamps = false,
        $incrementing = false,
        $search_columns = ['code', 'name', 'kbk'];

    protected
        $table = 'glossary__payments',
        $primaryKey = 'code',
        $guarded = [];
}
