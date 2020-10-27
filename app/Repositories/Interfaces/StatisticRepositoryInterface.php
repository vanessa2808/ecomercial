<?php
namespace App\Repositories\Interfaces;

interface StatisticRepositoryInterface
{
    public function getOrderWeek();
    public function getOrderMonth();
    public function getOrderQuarter();
    public function getOrderYear();
    public function getOrderDay();
}
