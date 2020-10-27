<?php
namespace App\Repositories\Interfaces;

interface StatisticRepositoryInterface
{
    public function getOrderWeek();
    public function getOrderMonth();
    public function getOrderQuarter();
    public function getOrderYear();
    public function getOrderDay();
    public function statistical();
    public function getOrderChartDay();
    public function getOrderChartWeek();
    public function getOrderChartMonth();
    public function getOrderChartQuarter();

}
