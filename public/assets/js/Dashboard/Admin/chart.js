
var ctxPie = document.getElementById('myDoughnutChart').getContext('2d');
var myPieChart = new Chart(ctxPie, {

    type: 'pie',

    data: {
        labels:categoryNames, 
        datasets: [{
            label: 'Top 5 Categories by Events', 
            data:categoryCounts, 
            backgroundColor: [
                'rgba(233, 241, 7, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(153, 102, 255, 0.6)'
            ],
            borderColor: [
                'rgba(233, 241, 7, 0.6)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw;
                    }
                }
            }
        }
    }
});




function getBarColor(value) {
if (value >= 50) {
   
    return 'rgba(0, 255, 0, 1)'; 
} else if (value >= 45) {
 
    return 'rgba(144, 238, 144, 0.8)'; 
} else if (value >= 40) {
  
    return 'rgba(255, 255, 0, 0.8)'; 
} else if (value >= 30) {
  
    return 'rgba(255, 165, 0, 0.8)'; 
} else if (value >= 20) {
  
    return 'rgba(255, 99, 71, 0.8)';
} else if (value >= 10) {
  
    return 'rgba(255, 0, 0, 0.8)'; 
} else {
  
    return 'rgb(228, 15, 15)'; 
}
}

const ctx = document.getElementById('eventsChart').getContext('2d');
new Chart(ctx, {
type: 'bar', 
data: {
    labels: months.map(month => `Mois ${month}`),  
    datasets: [{
        label: 'Événements', 
        data: totals, 
        backgroundColor: totals.map(value => getBarColor(value)),  
        borderColor: totals.map(value => getBarColor(value).replace('0.5', '1')),  
        borderWidth: 1
    }]
},
options: {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true 
        }
    }
}
});