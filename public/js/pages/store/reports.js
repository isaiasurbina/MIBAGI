jQuery(function($){
    var ctx = document.getElementById('sales-chart').getContext('2d');
    var ctx_ratings = document.getElementById('ratings-chart').getContext('2d');
    var ctx_product_views = document.getElementById('product-views-chart').getContext('2d');
    var ctx_product_sales = document.getElementById('product-sales-chart').getContext('2d');


    var myChartSales = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Julio', 'Agosto', 'Septiembre'],
            datasets: [{
                label: 'Ventas en $',
                data: [4363, 3523, 3956 ],
                backgroundColor: [
                    'rgba(4,217,217, 0.5)',
                ],
                borderColor: [
                    'rgba(1,22,64, 1)',
                    'rgba(1,22,64, 1)',
                    'rgba(1,22,64, 1)'
                ],
                borderWidth: 2,
                lineTension: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false,
                labels: {  defaultFontFamily: Chart.defaults.global.defaultFontFamily = "'rubik'", fontColor: Chart.defaults.global.defaultFontColor = 'rgb(1,22,64)', fontStyle: Chart.defaults.global.defaultFontStyle = "bold" }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Ventas en $',
                    }
                }]
            },
            layout: {
                padding: {
                    left: 10,
                    right: 50,
                    top: 0,
                    bottom: 0
                }
            }
        }
    });


    
    var myChartRatings = new Chart(ctx_ratings, {
        type: 'doughnut',
        data: {
            labels: ['Positivo', 'Neutral', 'Negativo', ],
            datasets: [{
                label: 'Porcentaje',
                data: [49.5, 34.5, 16 ],
                backgroundColor: [
                    'rgba(1, 22, 64, 0.9)',
                    'rgba(1, 22, 64, 0.5)',
                    'rgba(1, 22, 64, 0.3)',
                ],
                borderColor: [
                    'rgba(1, 22, 64, 1)',
                    'rgba(1, 22, 64, 1)',
                    'rgba(1, 22, 64, 1)',
                ],
                borderWidth: 0
            }]
        },
        options: {
            legend: {
                position: 'bottom',
                fullWidth: false
            },
            tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {
                    return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                  }
                }
            }
        }
    });

    var myChartProductViews = new Chart(ctx_product_views, {
        type: 'doughnut',
        data: {
            labels: ['ASUS TUF Gaming A15', 'MSI GL63 8SC-059 - Laptop de 15.6 pulgadas para videojuegos' ],
            datasets: [{
                label: 'Porcentaje',
                data: [ 16, 5],
                backgroundColor: [
                    'rgba(242, 116, 5, 1)',
                    'rgba(242, 116, 5, 0.6)',
                ],
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                fullWidth: false
            },
            tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {
                    return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + ' Vistas';
                  }
                }
            }
        }
    });

    var myChartProductSales = new Chart(ctx_product_sales, {
        type: 'line',
        data: {
            labels: ['Julio', 'Agosto', 'Septiembre' ],
            datasets: [{
                label: 'ASUS TUF Gaming A15',
                data: [ 12, 3, 6 ],
                backgroundColor: 'rgba(4,217,217,0.5)',
                borderWidth: 2,
                borderColor: "rgba(4,217,217, 1)",
                borderCapStyle: "square",
                lineTension: 0,           
            }, {
                label: 'MSI GL63 8SC-059 - Laptop de 15.6 pulgadas para videojuegos',
                data: [ 2, 5, 1 ],
                backgroundColor: [
                    'rgba(1,22,64, 1)',
                ],
                borderWidth: 2,
                borderColor: "rgba(1,22,64, 1)",
                lineTension: 0,
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            layout: {
                padding: {
                    left: 10,
                    right: 50,
                    top: 0,
                    bottom: 0
                }
            },
            tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {
                    return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + ' Unidades vendidas';
                  }
                }
            },
            scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: false,
                    reverse: false,
                    stepSize: 5
                  },
                }]
              }
        }
    });

});