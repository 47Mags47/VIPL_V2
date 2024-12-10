<?php

namespace App\Models\Glossary;

use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasSort, HasSearch;

    public
        $timestamps = false,
        $incrementing = false,
        $search_columns = ['payment_code'];

    protected
        $table = 'glossary__contracts',
        $guarded = [];

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_code', 'code');
    }
}
