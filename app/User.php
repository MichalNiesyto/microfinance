<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getBudgets(){
        return BudgetPermission::where('user_id', $this->id)
            ->join('budgets', 'budget_permissions.budget_id', '=', 'budgets.id')
            ->get();
    }

    public function getBudget($id){
        return Budget::findOrFail($id)
            ->join('budget_permissions', 'budget_permissions.budget_id', '=', 'budgets.id')
            ->get();
    }

}
