<?php

namespace App\Traits;

trait HasWriter
{
    public function scopeWrite(){
        if ($this->bank->sheme === null) return false;

        $writer_name = $this->bank->sheme->class ?? 'App\Core\Writer\\' . $this->bank->sheme->code . '_Writer';
        if(class_exists($writer_name)){
            $writer = new $writer_name ();
            return $writer->write($this);
        }else{
            return false;
        }
    }
}
