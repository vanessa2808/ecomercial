window.onload = function () {
    Chart.defaults.global.defaultFontColor = '#000000';
    Chart.defaults.global.defaultFontFamily = 'Arial';
    var lineChart = document.getElementById('order-chart-day');
    var dataStatistical = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    $.ajax({
        type: 'GET',
        url: 'api/statistical/day',
        success: function (res) {
            for (let item in res) {
                dataStatistical[item] = res[item];
            }
            var myChart = new Chart(lineChart, {
                type: 'line',
                data: {
                    labels: ['1:00', '2:00', '3:00','4:00','5:00','6:00','7:00', '8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '24:00'],
                    datasets: [
                        {
                            label: 'Revenue per day',
                            backgroundColor: 'rgba(0, 128, 128, 0.3)',
                            borderColor: 'rgba(0, 128, 128, 0.7)',
                            borderWidth: 1,
                            data: dataStatistical,
                        },
                    ]
                },
                options: {
                    animation: {
                        duration: 1000,
                        easing: 'linear'
                    },
                    scales: {
                        yAxes: [{
                            stacked: true
                        }]
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                        }]
                    },
                },
            });
        },
        error: function (err) {
            alert('Has error');
        }
    });

};
