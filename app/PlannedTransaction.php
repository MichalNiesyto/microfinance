<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlannedTransaction extends Model
{
    
    private static function buildQueryWithYear(Budget $budget, int $year){
       return static::where('budget_id', $budget->id)
            ->where(DB::raw('YEAR(transaction_date)'), $year);
    }

    private static function buildQueryWithMonth(Budget $budget, int $year, int $month){
        return static::buildQueryWithYear($budget, $year)
            ->where(DB::raw('MONTH(transaction_date)'), $month);
    }

    public static function getPlannedIncomeByMonth(Budget $budget, int $year, int $month) {
        return static::buildQueryWithMonth($budget, $year, $month)
            ->where('amount', '>', '0')
            ->get();
    }

    public static function getPlannedSpendingByMonth(Budget $budget, int $year, int $month){
        return static::buildQueryWithMonth($budget, $year, $month)
            ->where('amount', '<', '0')
            ->get();
    }

}
