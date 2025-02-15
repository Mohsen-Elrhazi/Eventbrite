<?php
namespace App\Controllers;

use App\Repositories\StatistiqueAdminRepository;
use App\Services\CategoryService;
class StatistiqueAdminController{
    private $StatistiqueAdminRepository;

    public function __construct()
    {
        $this->StatistiqueAdminRepository= new StatistiqueAdminRepository();
    }


    public function showCategoryCount() {
       
        $count = $this->StatistiqueAdminRepository->getCategoryCount();
        return  $count;
    }
    public function showEventsCount() {
        $count = $this->StatistiqueAdminRepository->getEventsCount();
      
        return  $count;
    }
    public function showOrganisateursCount() {
       
        $count = $this->StatistiqueAdminRepository->getOrganisateursCount();
      
        return $count;
    }
    public function showParticipantsCount() {
       
        $count = $this->StatistiqueAdminRepository->getParticipantCount();
      
        return  $count;
    }
    public function showMonthlyStats()
    {
        
        $monthlyStats = $this->StatistiqueAdminRepository->getMonthlyEventStats();
        $months = [];
        $totals = [];

        foreach ($monthlyStats as $row) {
            $months[] = $row['month']; 
            $totals[] = $row['total_events']; 
        }

        return [
            'months' => $months,
            'totals' => $totals,
        ];
    }
    public function getTopCategories() {

        $data = $this->StatistiqueAdminRepository->getTop5CategoryEventStats();
       return $data;
    }

}

