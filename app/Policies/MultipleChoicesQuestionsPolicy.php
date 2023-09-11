<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin\MultipleChoicesQuestions;
use Illuminate\Auth\Access\Response;

class MultipleChoicesQuestionsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MultipleChoicesQuestions $multipleChoicesQuestions): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MultipleChoicesQuestions $multipleChoicesQuestions): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MultipleChoicesQuestions $multipleChoicesQuestions): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MultipleChoicesQuestions $multipleChoicesQuestions): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MultipleChoicesQuestions $multipleChoicesQuestions): bool
    {
        //
    }
}
