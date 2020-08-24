<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class BudgetUserAccess extends Model
{
    public $timestamps = false;

    public static function getBudget(User $user){
        $budget = Budget::join('budget_user_accesses', 'budget_user_accesses.budget_id', 'budgets.id')
            ->where('budget_user_accesses.user_id', $user->id)
            ->first();
        return $budget;
    }
}
