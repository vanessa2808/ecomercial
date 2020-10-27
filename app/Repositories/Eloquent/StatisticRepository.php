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

    public function statistical()
    {
        $data = [];
        $currentYear = date('Y');
        $chart = DB::table('orders')
            ->select(DB::raw('month(created_at) as month'), DB::raw('sum(total_price) as TotalAmount '))
            ->where(DB::raw('year(created_at)'), $currentYear)
            ->where('status', config('const.status.approved'))
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        foreach ($chart as $item)
        {
            $data[$item->month - 1] = $item->TotalAmount;
        }

        return $data;
    }

    public function getOrderChartDay()
    {
        $data = [];
        Carbon::setWeekStartsAt(Carbon::now()->day);
        $chart = DB::table('orders')
            ->select(DB::raw('hour(created_at) as hour'), DB::raw('sum(total_price) as TotalAmount '))
            ->whereBetween('created_at', [Carbon::now()->startOfDay(),Carbon::now()->endOfDay()])
            ->where('status', config('const.status.approved'))
            ->groupBy(DB::raw('hour(created_at)'))
            ->get();

        foreach ($chart as $item)
        {
            $data[$item->hour-1] = $item->TotalAmount;
        }

        return $data;
    }

    public function getOrderChartWeek()
    {
        $data = [];
        $chart = DB::table('orders')
            ->select(DB::raw('weekday(created_at) as weekday'), DB::raw('sum(total_price) as TotalAmount '))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
            ->where('status', config('const.status.approved'))
            ->groupBy(DB::raw('weekday(created_at)'))
            ->get();

        foreach ($chart as $item)
        {
            $data[$item->weekday] = $item->TotalAmount;
        }

        return $data;
    }

    public function getOrderChartQuarter()
    {
        $data = [];

        $chart = DB::table('orders')
            ->select(DB::raw('quarter(created_at) as quarter'), DB::raw('sum(total_price) as TotalAmount '))
            ->whereRaw('QUARTER(created_at) = ?', Carbon::now()->quarter)
            ->where('status', config('const.status.approved'))
            ->groupBy(DB::raw('quarter(created_at)'))
            ->get();

        foreach ($chart as $item)
        {
            $data[$item->quarter-1] = $item->TotalAmount;
        }

        return $data;
    }

    public function getOrderChartMonth()
    {
        $data = [];
        $currentMonth = date('m');
        $chart = DB::table('orders')
            ->select(DB::raw('week(created_at) as week'), DB::raw('sum(total_price) as TotalAmount '))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('status', config('const.status.approved'))
            ->groupBy(DB::raw('week(created_at)'))
            ->get();

        foreach ($chart as $item)
        {
            $data[$item->week-40] = $item->TotalAmount;
        }

        return $data;
    }

}
