<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Repositories\Interfaces\StatisticRepositoryInterface;
use App\User;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    private $statisticRepository;

    public function __construct(StatisticRepositoryInterface $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }

    public function index()
    {
        $day = $this->statisticRepository->getOrderDay();

        $week = $this->statisticRepository->getOrderWeek();

        $month = $this->statisticRepository->getOrderMonth();

        $quarter = $this->statisticRepository->getOrderQuarter();

        $year = $this->statisticRepository->getOrderYear();

        return view('admin.chart.index', compact(['day','week', 'month', 'year', 'quarter']));
    }

    public function getStatistical()
    {
        $statistical = $this->statisticRepository->statistical();
        return $statistical;
    }

    public function indexDay()
    {
        $day = $this->statisticRepository->getOrderDay();

        $week = $this->statisticRepository->getOrderWeek();

        $month = $this->statisticRepository->getOrderMonth();

        $quarter = $this->statisticRepository->getOrderQuarter();

        $year = $this->statisticRepository->getOrderYear();

        return view('admin.chart.day', compact(['day','week', 'month', 'year', 'quarter']));
    }

    public function indexWeek()
    {
        $day = $this->statisticRepository->getOrderDay();

        $week = $this->statisticRepository->getOrderWeek();

        $month = $this->statisticRepository->getOrderMonth();

        $quarter = $this->statisticRepository->getOrderQuarter();

        $year = $this->statisticRepository->getOrderYear();

        return view('admin.chart.week', compact(['day','week', 'month', 'year', 'quarter']));
    }

    public function indexMonth()
    {
        $day = $this->statisticRepository->getOrderDay();

        $week = $this->statisticRepository->getOrderWeek();

        $month = $this->statisticRepository->getOrderMonth();

        $quarter = $this->statisticRepository->getOrderQuarter();

        $year = $this->statisticRepository->getOrderYear();

        return view('admin.chart.month', compact(['day','week', 'month', 'year', 'quarter']));
    }

    public function indexQuarter()
    {
        $day = $this->statisticRepository->getOrderDay();

        $week = $this->statisticRepository->getOrderWeek();

        $month = $this->statisticRepository->getOrderMonth();

        $quarter = $this->statisticRepository->getOrderQuarter();

        $year = $this->statisticRepository->getOrderYear();

        return view('admin.chart.quarter', compact(['day','week', 'month', 'year', 'quarter']));
    }

    public function getStatisticalByDay()
    {
        $statistical = $this->statisticRepository->getOrderChartDay();
        return $statistical;
    }

    public function getStatisticalByWeek()
    {
        $statistical = $this->statisticRepository->getOrderChartWeek();
        return $statistical;
    }

    public function getStatisticalByMonth()
    {
        $statistical = $this->statisticRepository->getOrderChartMonth();
        return $statistical;
    }

    public function getStatisticalByQuarter()
    {
        $statistical = $this->statisticRepository->getOrderChartQuarter();
        return $statistical;
    }

}
