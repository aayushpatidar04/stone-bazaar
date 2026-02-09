"use strict";
$(document).ready(function() {
    // Color palette matching original sparkline colors
    const colors = {
        orange: 'rgba(249, 123, 85, 0.92)',
        orangeFill: 'rgba(251, 154, 125, 0.50)',
        green: 'rgba(153, 214, 131, 0.80)',
        cyan: 'rgb(1, 192, 200)',
        cyanFill: 'rgba(1, 192, 200, 0.38)',
        lightBlue: '#4ddbf5',
        lightBlueFill: '#B8F4FF',
        blue: '#48a3ec',
        blueFill: '#9FCAED',
        pieColors: ['#9675CE', '#83D6DE', '#FEC107', '#4C5667'],
        tristatePositive: '#4CD4B0',
        tristateNegative: '#FDCDBE',
        tristateZero: '#E7DF86'
    };

    // Line Chart
    const lineCtx = document.getElementById('linechart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Data',
                data: [5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7],
                borderColor: colors.orange,
                backgroundColor: colors.orangeFill,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#bdc3c7',
                pointBorderColor: '#bdc3c7'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Bar Chart
    const barCtx = document.getElementById('barchart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'],
            datasets: [{
                label: 'Data',
                data: [5, 2, 2, 4, 9, 5, 7, 5, 2, 2, 6],
                backgroundColor: colors.green,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('piechart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Category A', 'Category B', 'Category C', 'Category D'],
            datasets: [{
                data: [1, 1, 2, 5],
                backgroundColor: colors.pieColors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Mouse Speed Chart
    const mouseCtx = document.getElementById('mousespeed').getContext('2d');
    const mpoints_max = 30;
    let mpoints = new Array(mpoints_max).fill(0);
    let lastmousex = -1;
    let lastmousey = -1;
    let lastmousetime;
    let mousetravel = 0;

    const mouseChart = new Chart(mouseCtx, {
        type: 'line',
        data: {
            labels: mpoints.map((_, i) => i + 1),
            datasets: [{
                label: 'Mouse Speed (px/s)',
                data: mpoints,
                borderColor: colors.cyan,
                backgroundColor: colors.cyanFill,
                fill: true,
                tension: 0.4,
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: { duration: 0 },
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'pixels per second'
                    }
                },
                x: { display: false }
            }
        }
    });

    $('body').on('mousemove', function(e) {
        const mousex = e.pageX;
        const mousey = e.pageY;
        if (lastmousex > -1) {
            mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
        }
        lastmousex = mousex;
        lastmousey = mousey;
    });

    const mrefreshinterval = 500;
    const mdraw = function() {
        const md = new Date();
        const timenow = md.getTime();
        if (lastmousetime && lastmousetime !== timenow) {
            const pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
            mpoints.push(pps);
            if (mpoints.length > mpoints_max) {
                mpoints.shift();
            }
            mousetravel = 0;
            mouseChart.data.datasets[0].data = mpoints;
            mouseChart.update('none');
        }
        lastmousetime = timenow;
        setTimeout(mdraw, mrefreshinterval);
    };
    setTimeout(mdraw, mrefreshinterval);

    // Custom Line Chart (composite/layered)
    const customCtx = document.getElementById('customchart').getContext('2d');
    new Chart(customCtx, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7'],
            datasets: [{
                label: 'Series 1',
                data: [15, 30, 27, 35, 50, 71, 60],
                borderColor: colors.lightBlue,
                backgroundColor: colors.lightBlueFill,
                fill: true,
                tension: 0.4
            }, {
                label: 'Series 2',
                data: [0, 5, 10, 7, 25, 35, 30],
                borderColor: colors.blue,
                backgroundColor: colors.blueFill,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Tristate Chart (implemented as stacked bar with positive/negative/zero)
    const tristateData = [1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1];
    const tristateCtx = document.getElementById('tristate').getContext('2d');
    new Chart(tristateCtx, {
        type: 'bar',
        data: {
            labels: tristateData.map((_, i) => i + 1),
            datasets: [{
                label: 'Tristate',
                data: tristateData.map(v => v === 0 ? 0.3 : v),
                backgroundColor: tristateData.map(v => {
                    if (v > 0) return colors.tristatePositive;
                    if (v < 0) return colors.tristateNegative;
                    return colors.tristateZero;
                }),
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const originalValue = tristateData[context.dataIndex];
                            return originalValue > 0 ? 'Positive' : originalValue < 0 ? 'Negative' : 'Zero';
                        }
                    }
                }
            },
            scales: {
                y: {
                    min: -1.5,
                    max: 1.5,
                    ticks: {
                        callback: function(value) {
                            if (value === 1) return 'Positive';
                            if (value === 0) return 'Zero';
                            if (value === -1) return 'Negative';
                            return '';
                        }
                    }
                }
            }
        }
    });
});
