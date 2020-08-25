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
        $user->budget_id = $user->budget_id = $budget->id;
        $user->save();
    }
}
