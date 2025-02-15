<?php
namespace App\Repositories;

class StatistiqueAdminRepository extends StatistiqueRepository{
    public function getCategoryCount(){
        $stmt=$this->conn->prepare("SELECT COUNT(*) FROM category");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getEventsCount(){
        $stmt=$this->conn->prepare("SELECT COUNT(*) FROM events");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getOrganisateursCount(){
        $stmt=$this->conn->prepare("SELECT COUNT(*) FROM users WHERE role = 'Organisateur'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getMonthlyEventStats(){
        $query="SELECT 
    months.month AS month,
    COALESCE(COUNT(e.event_id), 0) AS total_events
FROM 
    (SELECT 1 AS month UNION ALL 
     SELECT 2 UNION ALL 
     SELECT 3 UNION ALL 
     SELECT 4 UNION ALL 
     SELECT 5 UNION ALL 
     SELECT 6 UNION ALL 
     SELECT 7 UNION ALL 
     SELECT 8 UNION ALL 
     SELECT 9 UNION ALL 
     SELECT 10 UNION ALL 
     SELECT 11 UNION ALL 
     SELECT 12) AS months
LEFT JOIN events e 
    ON EXTRACT(MONTH FROM e.event_date) = months.month 
    AND EXTRACT(YEAR FROM e.event_date) = EXTRACT(YEAR FROM CURRENT_DATE)
GROUP BY months.month
ORDER BY month;

";
        $stmt=$this->conn->prepare($query);
        $stmt->execute(); 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }
    public function getTop5CategoryEventStats() {
        $query = "
        SELECT 
            c.nom AS category_name, 
            COUNT(e.event_id) AS event_count
        FROM 
            category c
        LEFT JOIN 
            events e 
        ON 
            c.category_id = e.category_id
        GROUP BY 
            c.nom
        ORDER BY 
            event_count DESC
        LIMIT 5;
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
