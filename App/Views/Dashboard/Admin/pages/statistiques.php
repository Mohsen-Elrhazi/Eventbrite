<?php
use App\Controllers\StatistiqueAdminController;
$objetController = new StatistiqueAdminController();
$totalCategory = $objetController->showCategoryCount(); 
$totalEvents = $objetController->showEventsCount(); 
$totalOrganisateurs = $objetController->showOrganisateursCount(); 
$totalParticipants = $objetController->showParticipantsCount(); 
$Top5Categories = $objetController->getTopCategories(); 

$categoryNames = array_column($Top5Categories, 'category_name'); 
$categoryCounts = array_column($Top5Categories, 'event_count');

$data = $objetController->showMonthlyStats();
$months = $data['months'];
$totals = $data['totals'];
?>
<div class="container">
    <div class="row text-center">
        <!-- Category Card -->
        <div class="col-md-3 col-sm-6 mb-4 "> 
            <div class=" shadow-sm pt-2">
                <div class="card-body">
                    <i class="fas fa-cogs fa-2x mb-3 text-primary"></i> 
                    <h5 class="card-title">Categories</h5>
                    <h3><?= $totalCategory; ?></h3>
                </div>
            </div>
        </div>

        
        <!-- Events Card -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class=" shadow-sm pt-2">
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-2x mb-3 text-success"></i> 
                    <h5 class="card-title">Events</h5>
                    <h3><?= $totalEvents; ?></h3>
                </div>
            </div>
        </div>

        <!-- Organizers Card -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class= "shadow-sm pt-2">
                <div class="card-body">
                    <i class="fas fa-users fa-2x mb-3 text-warning"></i> 
                    <h5 class="card-title">Organizers</h5>
                    <h3><?= $totalOrganisateurs; ?></h3>
                </div>
            </div>
        </div>

        <!-- Participants Card -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class=" shadow-sm pt-2">
                <div class="card-body">
                    <i class="fas fa-user-friends fa-2x mb-3 text-danger"></i> 
                    <h5 class="card-title">Participants</h5>
                    <h3><?= $totalParticipants; ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="container">
<div class="row justify-content-center gap-4">
    <!-- Doughnut Chart Card -->
    <div class="col-md-4 text-center p-3 rounded shadow-sm">
        <h4>Vue d'ensemble des catégories </h4>
        <canvas id="myDoughnutChart"></canvas>
    </div>

    <!-- Bar Chart Card -->
    <div class="col-md-7 text-center p-3 rounded shadow-sm">
        <h4>Vue d'ensemble des événements </h4>
        <canvas id="eventsChart"></canvas>
    </div>
</div>

</div>



<script>
   
   const months = <?php echo json_encode($months); ?>;
   const totals = <?php echo json_encode($totals); ?>;
   const categoryNames=<?= json_encode($categoryNames); ?>;
   const categoryCounts=<?= json_encode($categoryCounts); ?>;
</script>


