<?php

namespace App\Policies;

use App\Models\Main\PackageFile;
use App\Models\Main\User;

class PackageFilePolicy
{
    public function __construct(public PackageFile $file) {}

    public function view(User $user, PackageFile $file){
        return $user->isAdministration() or $file->package->division_code === $user->division_code;
    }
}
