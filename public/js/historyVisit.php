<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('visitorHistoryChart').getContext('2d');

        const visitorHistoryData = <?= json_encode(array_values($monthlyData)) ?>;

        const chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Visiteurs',
                    data: visitorHistoryData,
                    backgroundColor: 'transparent',
                    borderColor: getComputedStyle(document.documentElement).getPropertyValue('--color-site-item'),
                    pointBackgroundColor: getComputedStyle(document.documentElement).getPropertyValue('--color-site-item'),
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--color-text')
                        },
                        title: {
                            display: true,
                            text: 'Nombre de visiteurs',
                            color: getComputedStyle(document.documentElement).getPropertyValue('--color-text'),
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--color-text')
                        },
                        title: {
                            display: true,
                            text: 'Mois',
                            color: getComputedStyle(document.documentElement).getPropertyValue('--color-text'),
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--color-text')
                        }
                    }
                }
            }
        });
    });
</script>