<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function getViewModel(){
        return $this;
    }

    public static function createBudgetForUser(User $user){
        $budget = new Budget();
        $budget->name = 'Budget created by '.$user->name;
        $budget->save();
        $budgetAccess = new BudgetUserAccess();
        $budgetAccess->user_id = $user->id;
        $budgetAccess->budget_id = $budget->id;
        $budgetAccess->save();
        echo "Created budget";
    }
}
