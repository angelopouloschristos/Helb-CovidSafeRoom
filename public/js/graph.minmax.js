// ============================================
// As of Chart.js v2.5.0
// http://www.chartjs.org/docs
// ============================================

//////////////////////////////////////////////////////DEFINE CHART 1//////////////////////////////////////////////////////////////////////////////////
Chart.defaults.global.defaultFontColor = "#fff";

var chartData1 = document.getElementById('chartDataLocal1').getContext('2d'),
    gradient1 = chartData1.createLinearGradient(0, 0, 0, 450);

gradient1.addColorStop(0, 'rgba(0, 177, 72, 0.5)');
gradient1.addColorStop(0.5, 'rgba(0, 177, 72, 0.25)');
gradient1.addColorStop(1, 'rgba(255, 0, 0, 0)');

//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DEFINE CHART 2//////////////////////////////////////////////////////////////////////////////////

var chartMaxima1 = document.getElementById('chartMaximaLocal1').getContext('2d'),
    gradient2 = chartMaxima1.createLinearGradient(0, 0, 0, 450);

gradient2.addColorStop(0, 'rgba(255, 0,0, 0.5)');
gradient2.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
gradient2.addColorStop(1, 'rgba(255, 0, 0, 0)');

//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DEFINE CHART 3//////////////////////////////////////////////////////////////////////////////////

var chartMinima1 = document.getElementById('chartMinimaLocal1').getContext('2d'),
    gradient3 = chartMinima1.createLinearGradient(0, 0, 0, 450);

gradient3.addColorStop(0, 'rgba(0, 39, 195, 0.5)');
gradient3.addColorStop(0.5, 'rgba(0, 39, 195, 0.25)');
gradient3.addColorStop(1, 'rgba(255, 0, 0, 0)');

//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DEFINE CHART 4//////////////////////////////////////////////////////////////////////////////////

var chartMoyenne1 = document.getElementById('chartMoyenne1').getContext('2d'),
    gradient4 = chartMoyenne1.createLinearGradient(0, 0, 0, 450);

gradient4.addColorStop(0, 'rgba(231, 255, 97, 0.5)');
gradient4.addColorStop(0.5, 'rgba(231, 255, 97, 0.25)');
gradient4.addColorStop(1, 'rgba(255, 0, 0, 0)');

//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DEFINE CHART 5//////////////////////////////////////////////////////////////////////////////////

var chartEcartType1 = document.getElementById('chartEcartType1').getContext('2d'),
    gradient5 = chartEcartType1.createLinearGradient(0, 0, 0, 450);

gradient5.addColorStop(0, 'rgba(97, 158, 255, 0.5)');
gradient5.addColorStop(0.5, 'rgba(97, 158, 255, 0.25)');
gradient5.addColorStop(1, 'rgba(255, 0, 0, 0)');

//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DEFINE CHART 6//////////////////////////////////////////////////////////////////////////////////

var chartMediane1 = document.getElementById('chartMediane1').getContext('2d'),
    gradient6 = chartMediane1.createLinearGradient(0, 0, 0, 450);

gradient6.addColorStop(0, 'rgba(115, 97, 255, 0.5)');
gradient6.addColorStop(0.5, 'rgba(115, 97, 255, 0.25)');
gradient6.addColorStop(1, 'rgba(255, 0, 0, 0)');

//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DATA 1//////////////////////////////////////////////////////////////////////////////////


var data1  = {
    labels: [],
    datasets: [{
        label: 'PPM',
        backgroundColor: gradient1,
        pointBackgroundColor: 'white',
        borderWidth: 1,
        borderColor: '#00b148',
        hoverBackgroundColor: '#00b148',
        data: []

    }]
};
//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DATA 2//////////////////////////////////////////////////////////////////////////////////
var data2  = {
    labels: [ t6, t5, t4, t3, t2, t1, t0 ],
    datasets: [{
        label: '%',
        backgroundColor: gradient2,
        pointBackgroundColor: 'white',
        borderWidth: 1,
        borderColor: '#911215',
        hoverBackgroundColor: '#911215',
        data: [hum7, hum6, hum5, hum4, hum3, hum2, hum1]
    }]
};
//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////DATA 3//////////////////////////////////////////////////////////////////////////////////
var data3  = {
    labels: [ h6, h5, h4, h3, h2, h1, h0 ],
    datasets: [{
        label: '°C',
        backgroundColor: gradient3,
        pointBackgroundColor: 'white',
        borderWidth: 1,
        borderColor: '#0027c3',
        hoverBackgroundColor: '#0027c3',

        data: [tem7, tem6, tem5, tem4, tem3, tem2, tem1]
    }]
};


//////////////////////////////////////////////////////GRAPHIC OPTION 1//////////////////////////////////////////////////////////////////////////////////
var options1 = {
    responsive: true,
    maintainAspectRatio: false,
    animation: {
        easing: 'easeInOutQuad',
        duration: 520
    },
    scales: {
        xAxes: [{
            gridLines: {
                //color: 'rgba(200, 200, 200, 0.05)',
                color: 'rgba(255, 255, 255, 0.05)',
                lineWidth: 1
            }
        }],
        yAxes: [{
            gridLines: {
                //color: 'rgba(200, 200, 200, 0.08)',
                color: 'rgba(255, 255, 255, 0.08)',
                lineWidth: 1
            }
        }]
    },
    elements: {
        line: {
            tension: 0.4
        }
    },
    legend: {
        display: false
    },
    point: {
        backgroundColor: 'white'
    },
    tooltips: {
        titleFontFamily: 'Open Sans',
        backgroundColor: 'rgba(0,0,0,0.3)',
        titleFontColor: 'red',
        caretSize: 5,
        cornerRadius: 2,
        xPadding: 10,
        yPadding: 10
    },

    title: {
        display: true,
        text: 'Les '+title_chart+' de Co2',
    }


};
//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////GRAPHIC OPTION 2//////////////////////////////////////////////////////////////////////////////////
var options2 = {
    responsive: true,
    maintainAspectRatio: false,
    animation: {
        easing: 'easeInOutQuad',
        duration: 520
    },
    scales: {
        xAxes: [{
            gridLines: {
                //color: 'rgba(200, 200, 200, 0.05)',
                color: 'rgba(255, 255, 255, 0.05)',
                lineWidth: 1
            }
        }],
        yAxes: [{
            gridLines: {
                //color: 'rgba(200, 200, 200, 0.08)',
                color: 'rgba(255, 255, 255, 0.08)',

                lineWidth: 1
            }
        }]
    },
    elements: {
        line: {
            tension: 0.4
        }
    },
    legend: {
        display: false
    },
    point: {
        backgroundColor: 'white'
    },
    tooltips: {
        titleFontFamily: 'Open Sans',
        backgroundColor: 'rgba(0,0,0,0.3)',
        titleFontColor: 'red',
        caretSize: 5,
        cornerRadius: 2,
        xPadding: 10,
        yPadding: 10
    },
    title: {
        display: true,
        text: 'Les '+title_chart+' de Humidité'
    }

};
//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////GRAPHIC OPTION 3//////////////////////////////////////////////////////////////////////////////////
var options3 = {
    responsive: true,
    maintainAspectRatio: false,
    animation: {
        easing: 'easeInOutQuad',
        duration: 520
    },
    scales: {
        xAxes: [{
            gridLines: {
                color: 'rgba(200, 200, 200, 0.05)',
                lineWidth: 1
            }
        }],
        yAxes: [{
            gridLines: {
                color: 'rgba(200, 200, 200, 0.08)',
                lineWidth: 1
            }
        }]
    },
    elements: {
        line: {
            tension: 0.4
        }
    },
    legend: {
        display: false
    },
    point: {
        backgroundColor: 'white'
    },
    tooltips: {
        titleFontFamily: 'Open Sans',
        backgroundColor: 'rgba(0,0,0,0.3)',
        titleFontColor: 'red',
        caretSize: 5,
        cornerRadius: 2,
        xPadding: 10,
        yPadding: 10
    },
    title: {
        display: true,
        text: 'Les '+title_chart+' de Temperature'
    }

};
//////////////////////////////////////////////////////END//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////CHART INSTANCE CREATION//////////////////////////////////////////////
var chartInstance = new Chart(chartData1, {
    type: 'line',
    data: data1,
    options: options1,


});

var chartInstance = new Chart(chartMaxima1, {
    type: 'line',
    data: data3,
    options: options3

});

var chartInstance = new Chart(chartMinima1, {
    type: 'line',
    data: data2,
    options: options2
});



//////////////////////////////////////////////////////////END//////////////////////////////////////////////
