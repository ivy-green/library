// import Utils from '../../resources/js/Utils'; 

const bookBorrowInMonths = document.getElementById('book_in_months');
const violateOnBorrow = document.getElementById('violate_on_borow');
const userAgeChart = document.getElementById('user_average_age');

var pathname = window.location.pathname;

var bgColor = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)',
];

var bdColor = [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)',
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)',
];

var months = [
    'Tháng 1',
    'Tháng 2',
    'Tháng 3',
    'Tháng 4',
    'Tháng 5',
    'Tháng 6',
    'Tháng 7',
    'Tháng 8',
    'Tháng 9',
    'Tháng 10',
    'Tháng 11',
    'Tháng 12',
];

var monthDemoData = [
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '10',
    '11',
    '12',
];

// const months = Utils.months({count: 7});
const DATA_COUNT = 7;
const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};

// const labels = Utils.months({count: 12});
// const violateData = {
//     labels: labels,
//     datasets: [
//         {
//         label: 'Dataset 1',
//         data: Utils.numbers(NUMBER_CFG),
//         borderColor: Utils.CHART_COLORS.red,
//         backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
//         },
//         {
//         label: 'Dataset 2',
//         data: Utils.numbers(NUMBER_CFG),
//         borderColor: Utils.CHART_COLORS.blue,
//         backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
//         }
//     ]
// };

$(document).ready(function(){
    const BookBorrowInMonthsChart = new Chart(bookBorrowInMonths, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: "Sách mượn theo tháng",
                data: monthCount,
                fill: false,
                backgroundColor: bgColor,
                borderColor: bdColor,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    const UserAgeChart = new Chart(userAgeChart, {
        labels: gender_data,
        type: 'bar',
        data: {
            labels: gender_data,
            datasets: [{
                label: "Độ tuổi trung bình của độc giả",
                data: age_data,
                backgroundColor: bgColor,
                borderColor: bdColor,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    const ViolateOnBorrow = new Chart(bookBorrowInMonths, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: "Lượt vi phạm",
                data: violateCount,
                fill: false,
                backgroundColor: bgColor,
                borderColor: bdColor,
                borderWidth: 1
            },
            {
                label: "Lượt mượn sách",
                data: borrowCount,
                fill: false,
                backgroundColor: bgColor,
                borderColor: bdColor,
                borderWidth: 1
            }
        ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});


