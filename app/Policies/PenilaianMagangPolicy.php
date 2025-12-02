<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PenilaianMagang;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenilaianMagangPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PenilaianMagang');
    }

    public function view(AuthUser $authUser, PenilaianMagang $penilaianMagang): bool
    {
        return $authUser->can('View:PenilaianMagang');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PenilaianMagang');
    }

    public function update(AuthUser $authUser, PenilaianMagang $penilaianMagang): bool
    {
        return $authUser->can('Update:PenilaianMagang');
    }

    public function delete(AuthUser $authUser, PenilaianMagang $penilaianMagang): bool
    {
        return $authUser->can('Delete:PenilaianMagang');
    }

    public function restore(AuthUser $authUser, PenilaianMagang $penilaianMagang): bool
    {
        return $authUser->can('Restore:PenilaianMagang');
    }

    public function forceDelete(AuthUser $authUser, PenilaianMagang $penilaianMagang): bool
    {
        return $authUser->can('ForceDelete:PenilaianMagang');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PenilaianMagang');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PenilaianMagang');
    }

    public function replicate(AuthUser $authUser, PenilaianMagang $penilaianMagang): bool
    {
        return $authUser->can('Replicate:PenilaianMagang');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PenilaianMagang');
    }

}