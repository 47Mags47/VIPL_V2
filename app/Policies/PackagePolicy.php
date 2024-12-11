<?php

namespace App\Policies;

use App\Models\Main\Package;
use App\Models\Main\User;

class PackagePolicy
{
    public function __construct(public Package $package) {}

    public function view(User $user, Package $package){
        return $user->isAdministration() or $package->division_code === $user->division_code;
    }
}
