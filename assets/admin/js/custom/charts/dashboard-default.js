$(window).on("load", function () {
  "use strict";

  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  // chart chart-leads start
  var chartColors = chartColors = {
    red: '#f37070',
    pink: '#ff445d',
    orange: '#ff8f3a',
    yellow: '#ffde16',
    lightGreen: '#24cf91',
    green: '#4ecc48',
    blue: '#5797fc',
    skyBlue: '#33d4ff',
    gray: '#cfcfcf'
  };
  var color = Chart.helpers.color;

  if($('#chart-site-visits').length) {
    var optsSiteVisits = {
      responsive: true,
      legend: {
        display: false
      },
      layout: {
        padding: 0
      },
      scales: {
        xAxes: [{
          display: false
        }],
        yAxes: [{
          display: false
        }]
      }
    };

    var ctxSiteVisits = document.getElementById('chart-site-visits');
    new Chart(ctxSiteVisits, {
      type: 'line',
      data: {
        labels: ["Page A", "Page B", "Page C", "Page D", "Page E", "Page F", "Page G", "Page K", "Page M", "Page R", "Page S", "Page T", "Page U", "Page V", "Page W"],
        datasets: [
          {
            label: 'Site Visits',
            data: [1, 2, 0, 1, 3, 1, 5, 2, 3, 2, 1, 0, 2, 8, 0],
            pointRadius: 0,
            backgroundColor: '#FE9E15',
            borderWidth: 0,
            borderColor: '#FE9E15',
            hoverBorderWidth: 0,
            pointBorderWidth: 0,
            pointHoverBorderWidth: 0,
          },
          {
            label: 'Site Visits',
            data: [0, 5, 10, 4, 16, 5, 11, 6, 11, 30, 10, 13, 4, 3, 1],
            pointRadius: 0,
            backgroundColor: '#038FDE',
            borderWidth: 0,
            borderColor: '#038FDE',
            hoverBorderWidth: 0,
            pointBorderWidth: 0,
            pointHoverBorderWidth: 0,
          }
        ]
      },
      options: optsSiteVisits
    });
  }

  // Estimation doughnut Chart Start
  if ($('#estimation-doughnut').length) {
    var estimation_data = {
      labels: [
        "Sent",
        "Approved",
        "Denied",
        "Expired"
      ],
      datasets: [
        {
          data: [21, 9, 5, 11],
          backgroundColor: [
            color(chartColors.blue).alpha(0.8).rgbString(),
            color(chartColors.lightGreen).alpha(0.8).rgbString(),
            color(chartColors.pink).alpha(0.8).rgbString(),
            color(chartColors.gray).alpha(0.8).rgbString()
          ],
          hoverBackgroundColor: [
            color(chartColors.blue).alpha(0.8).rgbString(),
            color(chartColors.lightGreen).alpha(0.8).rgbString(),
            color(chartColors.pink).alpha(0.8).rgbString(),
            color(chartColors.gray).alpha(0.8).rgbString()
          ]
        }
      ]
    };

    new Chart(document.getElementById('estimation-doughnut'), {
      type: 'doughnut',
      data: estimation_data,
      options: {
        cutoutPercentage: 90,
        responsive: false,
        legend: {
          display: false
        }
      }
    });
  }
  // Estimation doughnut Chart End

  // proposal doughnut Chart Start
  if ($('#proposal-doughnut').length) {
    var proposal_data = {
      labels: [
        "Sent",
        "Approved",
        "Denied",
        "Expired"
      ],
      datasets: [
        {
          data: [30, 9, 3, 11],
          backgroundColor: [
            color(chartColors.blue).alpha(0.8).rgbString(),
            color(chartColors.green).alpha(0.8).rgbString(),
            color(chartColors.red).alpha(0.8).rgbString(),
            color(chartColors.yellow).alpha(0.8).rgbString()
          ],
          hoverBackgroundColor: [
            color(chartColors.blue).alpha(0.8).rgbString(),
            color(chartColors.green).alpha(0.8).rgbString(),
            color(chartColors.red).alpha(0.8).rgbString(),
            color(chartColors.yellow).alpha(0.8).rgbString()
          ]
        }
      ]
    };

    new Chart(document.getElementById('proposal-doughnut'), {
      type: 'doughnut',
      data: proposal_data,
      options: {
        cutoutPercentage: 80,
        responsive: false,
        legend: {
          display: false
        }
      }
    });
  }
  // proposal doughnut Chart End

  // tickets doughnut Chart Start
  if ($('#tickets-doughnut').length) {
    var proposal_data = {
      labels: [
        "Sales",
        "Technical",
        "Account",
        "Dispute"
      ],
      datasets: [
        {
          data: [14, 12, 7, 3],
          backgroundColor: [
            color(chartColors.blue).alpha(0.8).rgbString(),
            color(chartColors.green).alpha(0.8).rgbString(),
            color(chartColors.yellow).alpha(0.8).rgbString(),
            color(chartColors.red).alpha(0.8).rgbString()
          ],
          hoverBackgroundColor: [
            color(chartColors.blue).alpha(0.8).rgbString(),
            color(chartColors.green).alpha(0.8).rgbString(),
            color(chartColors.yellow).alpha(0.8).rgbString(),
            color(chartColors.red).alpha(0.8).rgbString()
          ]
        }
      ]
    };

    new Chart(document.getElementById('tickets-doughnut'), {
      type: 'doughnut',
      data: proposal_data,
      options: {
        cutoutPercentage: 80,
        responsive: false,
        legend: {
          display: false
        }
      }
    });
  }
  // tickets doughnut Chart End

  // creating center text
  Chart.pluginService.register({
    beforeDraw: function (chart) {
      var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

      var center_text = $(ctx.canvas).data('fill');
      if (center_text) {
        var $dtTheme = localStorage.getItem('dt-theme');
        ctx.restore();
        var fontSize = (height / 114).toFixed(2);
        ctx.font = 3 + "rem Source Sans Pro";
        ctx.textBaseline = "middle";

        /*if ($dtTheme == 'dark') {
         ctx.fillStyle = "#fff";
         }*/

        var textX = Math.round((width - ctx.measureText(center_text).width) / 2),
          textY = height / 2;

        ctx.fillText(center_text, textX, textY);
        ctx.save();
      }
    }
  });

  // Leads polarArea Chart Start
  if ($('#lead-number').length) {
    var mobileData = [200, 350, 250, 180, 290];
    var desktopData = [250, 180, 200, 350, 230];
    var currentScreen = 'mobile';
    var $leadNumber = $('#lead-number');

    var config = {
      type: 'polarArea',
      data: {
        datasets: [{
          data: mobileData,
          backgroundColor: [
            color(chartColors.red).alpha(0.8).rgbString(),
            color(chartColors.orange).alpha(0.8).rgbString(),
            color(chartColors.yellow).alpha(0.8).rgbString(),
            color(chartColors.green).alpha(0.8).rgbString(),
            color(chartColors.blue).alpha(0.8).rgbString(),
          ],
          label: 'My dataset' // for legend
        }],
        labels: [
          'IE & Edge',
          'Firefox',
          'Safari',
          'Chrome',
          'Opera'
        ]
      },
      options: {
        responsive: false,
        legend: {
          display: false
        },
        layout: {
          padding: {
            top: 0,
            left: 0,
            right: 0,
            bottom: 0
          }
        },
        scale: {
          display: false
        }
      }
    };

    var randomScalingFactor = function () {
      return Math.round(Math.random() * 100);
    };

    var leadPolarArea = new Chart(document.getElementById('chart-leads'), config);

    $('#toggle-view').on('click', function () {
      $(this).find('i').toggleClass('icon-smart-phone icon-desktop');

      config.data.datasets.forEach(function (piece, i) {
        if (currentScreen == 'mobile') {
          currentScreen = 'desktop';
          config.data.datasets[i].data = desktopData;
          $leadNumber.text('9,365');
        } else {
          currentScreen = 'mobile';
          config.data.datasets[i].data = mobileData;
          $leadNumber.text('8,789');
        }
      });

      leadPolarArea.update();
    });
  }
  // Leads polarArea Chart end

  

  // tickets doughnut Chart Start
  if ($('#monthly-leads-bar').length) {
    var monthly_leads_data = {
      labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
      datasets: [
        {
          label: 'Leads',
          backgroundColor: color(chartColors.pink).rgbString(),
          borderColor: color(chartColors.pink),
          hoverBorderColor: color(chartColors.pink),
          borderWidth: 0,
          data: [10, 15, 8, 13, 10, 14, 4, 13, 11, 8, 13, 4]
        }
      ]
    };

    new Chart(document.getElementById('monthly-leads-bar'), {
      type: 'bar',
      data: monthly_leads_data,
      options: {
        responsive: true,
        legend: {
          display: false
        },
        layout: {
          padding: {
            top: 0,
            left: 0,
            right: 0,
            bottom: 0
          }
        },
        tooltips: {
          callbacks: {
            title: function (tooltipItem, data) {
              var tindex = tooltipItem[0].index;
              return months[tindex];
            }
          }
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false
            },
            display: true,
            categoryPercentage: 1.0,
            barPercentage: 0.6
          }],
          yAxes: [{
            display: false
          }]
        }
      }
    });
  }

  // tickets doughnut Chart End
  if ($('#tasks-chart').length) {
    var gaugeChart = AmCharts.makeChart("tasks-chart", {
      "type": "gauge",
      "theme": "light",
      "axes": [{
        "axisAlpha": 0,
        "tickAlpha": 0,
        "labelsEnabled": false,
        "startValue": 0,
        "endValue": 12,
        "startAngle": 0,
        "endAngle": 360,
        "bands": [{
          "color": color(chartColors.gray).alpha(0.8).rgbString(),
          "startValue": 0,
          "endValue": 12,
          "radius": "100%",
          "innerRadius": "95%"
        }, {
          "color": "#52c41a",
          "startValue": 0,
          "endValue": 8,
          "radius": "100%",
          "innerRadius": "95%",
          "balloonText": "6.5"
        }, {
          "color": color(chartColors.gray).alpha(0.8).rgbString(),
          "startValue": 0,
          "endValue": 12,
          "radius": "90%",
          "innerRadius": "85%"
        }, {
          "color": "#f44336",
          "startValue": 0,
          "endValue": 6,
          "radius": "90%",
          "innerRadius": "85%",
          "balloonText": "2.5"
        }, {
          "color": color(chartColors.gray).alpha(0.8).rgbString(),
          "startValue": 0,
          "endValue": 12,
          "radius": "80%",
          "innerRadius": "75%"
        }, {
          "color": "#fa8c16",
          "startValue": 0,
          "endValue": 3,
          "radius": "80%",
          "innerRadius": "75%",
          "balloonText": "5"
        }]
      }],
      "allLabels": [{
        "text": "23 Tasks",
        "y": "45%",
        "size": 12,
        "bold": true,
        "color": "#212121",
        "align": "center"
      }],
      "export": {
        "enabled": false
      }
    });

    gaugeChart.addListener("init", function (event) {
      // get map object
      var chart = event.chart;
      $(chart.amLink).addClass('amcharts-link').css('opacity', '0');
    });
  }

  if($('#chart-growth').length) {
    var ctxGrowth = document.getElementById('chart-growth').getContext('2d');
    var gradientGrowth = ctxGrowth.createLinearGradient(0, 0, 180, 0);
    gradientGrowth.addColorStop(0.4, color('#ed8faa').alpha(0.9).rgbString());
    gradientGrowth.addColorStop(1, color('#6757de').alpha(0.9).rgbString());

    var optsGrowth = {
      responsive: false,
      legend: {
        display: false
      },
      layout: {
        padding: 0
      },
      elements: {
        line: {
          tension: 0 // disables bezier curves
        }
      },
      scales: {
        xAxes: [{
          display: false
        }],
        yAxes: [{
          display: false
        }]
      }
    };

    new Chart(ctxGrowth, {
      type: 'line',
      data: {
        labels: ["Page A", "Page B", "Page C", "Page D", "Page E", "Page F"],
        datasets: [{
          label: 'Active Users',
          data: [10, 2000, 600, 4400, 900, 4850],
          pointRadius: 0,
          backgroundColor: gradientGrowth,
          hoverBackgroundColor: gradientGrowth,
          borderWidth: 0,
          borderColor: 'transparent',
          hoverBorderColor: 'transparent',
          hoverBorderWidth: 0,
          pointBorderWidth: 0,
          pointHoverBorderWidth: 0
        }]
      },
      options: optsGrowth
    });
  }

  // Total Revenue
  if($('#chart-total-revenue').length) {
    var optsCampaignStats = {
      responsive: false,
      legend: {
        display: false
      },
      layout: {
        padding: 0
      },
      scales: {
        xAxes: [
          {
            display: false,
            stacked: true,
            categoryPercentage: 1.0,
            barPercentage: 0.6
          }
        ],
        yAxes: [
          {
            display: false,
            stacked: true
          }
        ]
      }
    };

    var ctxCampaignStats = document.getElementById('chart-total-revenue');
    new Chart(ctxCampaignStats, {
      type: 'bar',
      data: {
        labels: ["Page A", "Page B", "Page C", "Page D", "Page E", "Page F", "Page G", "Page K", "Page M"],
        datasets: [
          {
            label: 'Stats',
            data: [200, 500, 700, 500, 200, 400, 400, 400, 200],
            backgroundColor: '#038FDE'
          },
          {
            label: 'Stats',
            data: [600, 900, 1200, 900, 800, 400, 500, 1200, 800],
            backgroundColor: '#FE9E15'
          }
        ]
      },
      options: optsCampaignStats
    });
  }
});