<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Raport extends Model
{
    ### Настройки
    ##################################################
    protected
        $table = 'main__raports',
        $guarded = [],
        $casts = ['date' => 'date'];

    public function scopeLocalPath(){
        return $this->path . '/' . $this->name;
    }

    public function scopeFullPath(){
        return Storage::disk('raports')->path($this->localPath());
    }
}
