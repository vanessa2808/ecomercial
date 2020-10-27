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

}
