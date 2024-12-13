<?php

namespace App\Traits;

trait HasWriter
{
    public function scopeWrite(){
        $writer_name = $this->bank->sheme !== null
            ? $this->bank->sheme->class ?? 'App\Core\Writer\\' . $this->bank->sheme->code . '_Writer'
            : $writer_name = 'App\Core\Writer\Other_Writer';

        if(class_exists($writer_name)){
            $writer = new $writer_name ();
            return $writer->write($this);
        }else{
            return false;
        }
    }
}
