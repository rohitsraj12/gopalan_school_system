// $(document).ready(function(){

//     var selId = document.getElementsById("attendance").getContext("2d");

//     var peiChart = new Chart(selId, {
//         type: 'pei',
//         labels: [
//             'Red',
//             'Yellow'
//           ],
//           datasets: [{
//             label: 'My First Dataset',
//             data: [95, 5],
//             backgroundColor: [
//               'rgb(255, 99, 132)',
//               'rgb(255, 205, 86)'
//             ],
//             hoverOffset: 4
//           }]
//     })

// })

(function(jQuery){
    // var radarData = {
    //     labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    //     datasets: [
    //         {
    //             label: "My First dataset",
    //             fillColor: "rgba(21,186,103,0.5)",
    //             strokeColor: "rgba(220,220,220,1)",
    //             pointColor: "rgba(220,220,220,1)",
    //             pointStrokeColor: "#fff",
    //             pointHighlightFill: "#fff",
    //             pointHighlightStroke: "rgba(220,220,220,1)",
    //             data: [65, 59, 90, 81, 56, 55, 40]
    //         },
    //         {
    //             label: "My Second dataset",
    //             fillColor: "rgba(21,113,186,0.5)",
    //             strokeColor: "rgba(151,187,205,1)",
    //             pointColor: "rgba(151,187,205,1)",
    //             pointStrokeColor: "#fff",
    //             pointHighlightFill: "#fff",
    //             pointHighlightStroke: "rgba(151,187,205,1)",
    //             data: [28, 48, 40, 19, 96, 27, 100]
    //         }
    //     ]
    // };

    // var barData = {
    //     labels: ["January", "February", "March", "April", "May", "June", "July"],
    //     datasets: [
    //         {
    //             label: "My First dataset",
    //             fillColor: "rgba(21,186,103,0.5)",
    //             strokeColor: "rgba(220,220,220,0.8)",
    //             highlightFill: "rgba(220,220,220,0.75)",
    //             highlightStroke: "rgba(220,220,220,1)",
    //             data: [65, 59, 80, 81, 56, 55, 40]
    //         },
    //         {
    //             label: "My Second dataset",
    //             fillColor: "rgba(21,113,186,0.5)",
    //             strokeColor: "rgba(151,187,205,0.8)",
    //             highlightFill: "rgba(151,187,205,0.75)",
    //             highlightStroke: "rgba(151,187,205,1)",
    //             data: [28, 48, 40, 19, 86, 27, 90]
    //         }
    //     ]
    // };

    // var lineChartData = {
    //     labels: ["January", "February", "March", "April", "May", "June", "July"],
    //     datasets: [
    //         {
    //             label: "My First dataset",
    //             fillColor: "rgba(21,186,103,0.5)",
    //             strokeColor: "rgba(220,220,220,1)",
    //             pointColor: "rgba(220,220,220,1)",
    //             pointStrokeColor: "#fff",
    //             pointHighlightFill: "#fff",
    //             pointHighlightStroke: "rgba(220,220,220,1)",
    //             data: [65, 59, 80, 81, 56, 55, 40]
    //         },
    //         {
    //             label: "My Second dataset",
    //             fillColor: "rgba(21,113,186,0.5)",
    //             strokeColor: "rgba(151,187,205,1)",
    //             pointColor: "rgba(151,187,205,1)",
    //             pointStrokeColor: "#fff",
    //             pointHighlightFill: "#fff",
    //             pointHighlightStroke: "rgba(151,187,205,1)",
    //             data: [28, 48, 40, 19, 86, 27, 90]
    //         }
    //     ]
    // };


    // var doughnutData = [
    //         {
    //             value: 100,
    //             color:"#4ED18F",
    //             highlight: "#15BA67",
    //             label: "Alfa"
    //         },
    //         {
    //             value: 250,
    //             color: "#15BA67",
    //             highlight: "#15BA67",
    //             label: "Beta"
    //         },
    //         {
    //             value: 100,
    //             color: "#5BAABF",
    //             highlight: "#15BA67",
    //             label: "Gamma"
    //         },
    //         {
    //             value: 40,
    //             color: "#94D7E9",
    //             highlight: "#15BA67",
    //             label: "Peta"
    //         },
    //         {
    //             value: 120,
    //             color: "#BBE0E9",
    //             highlight: "#15BA67",
    //             label: "X"
    //         }

    //     ];

        
    var attendance = [
        {
            value: 85,
            color:"#5465ff",
            highlight: "#9bb1ff",
            label: "present",
            hoverOffset: 4
        },
        {
            value: 15,
            color: "#b9375e",
            highlight: "#ff7aa2",
            label: "Absent",
            hoverOffset: 4
        }

    ];

         window.onload = function(){
            // var ctx = $(".doughnut-chart")[0].getContext("2d");
            // window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
            //     responsive : true,
            //     showTooltips: true
            // });

            var ctx2 = $("#attendance")[0].getContext("2d");
            window.myPie = new Chart(ctx2).Pie(attendance, {
                responsive : true,
                showTooltips: true
            });

            // var ctx3 = $(".line-chart")[0].getContext("2d");
            // window.myLine = new Chart(ctx3).Line(lineChartData, {
            //     responsive : true,
            //     showTooltips: true
            // });

            // var ctx4 = $(".bar-chart")[0].getContext("2d");
            // window.myBar = new Chart(ctx4).Bar(barData, {
            //     responsive : true,
            //     showTooltips: true
            // });

            // var ctx5 = $(".radar-chart")[0].getContext("2d");
            // window.myRadar = new Chart(ctx5).Radar(radarData, {
            //     responsive : true,
            //     showTooltips: true
            // });

            // var ctx6 = $(".polar-chart")[0].getContext("2d");
            // window.myPolar = new Chart(ctx6).PolarArea(doughnutData, {
            //     responsive : true,
            //     showTooltips: true
            // });
        };
    })(jQuery);