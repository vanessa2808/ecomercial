<?php
namespace App\Repositories\Eloquent;

use App\Models\Order;
use Auth;
use App\Repositories\Interfaces\StatisticRepositoryInterface;
use DB;
use Carbon\Carbon;

class StatisticRepository extends BaseRepository implements StatisticRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function getOrderDay()
    {
        Carbon::setWeekStartsAt(Carbon::now()->day);
        $day = $this->model->whereBetween('created_at', [Carbon::now()->startOfDay(),Carbon::now()->endOfDay()])->count();

        return $day;
    }

    public function getOrderWeek()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $week = $this->model->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();

        return $week;
    }

    public function getOrderMonth()
    {
        $currentMonth = date('m');
        $month = $this->model->whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();

        return $month;
    }

    public function getOrderQuarter()
    {
        $quarter = $this->model->whereRaw('QUARTER(created_at) = ?', Carbon::now()->quarter)->count();

        return $quarter;
    }

    public function getOrderYear()
    {
        $currentYear = date('Y');
        $year = $this->model->whereRaw('YEAR(created_at) = ?',[$currentYear])->count();

        return $year;
    }

}
