// window.chart = require('chart.js');

$(document).ready(function () {
    // $('#sidebar').mCustomScrollBar({
    //     theme: "minimal"
    // });
    $('.container').attr('style', '');

    
    openCloseSideNavigation();
    setSideNavigation();
    chartHandle();
});
// login page
$(window).on('resize', function(){
    if($(window).width() > 1024){
        $('#rule').addClass('show');    
    }else {
        $('#rule').removeClass('show');
    }
});

function setNavigation(){
    var root = window.location;
    var path = root.search.substring(1).split('=')[1];
    if(path == undefined)
        var path = root.pathname.replace("/\/$/","");
    path = decodeURIComponent(path);

    $('.sidebar-header').removeClass('active-before');

    $('#sidebar ul.nav-list > li').each(function(idx, li) {
        var element = $(li);
        var href = element.find('a').attr('href');
        element.removeClass('active-main active-after active-before');
        element.find('ul').removeClass('show');

        if((path.indexOf(href) >= 0 || href.indexOf(path) >= 0) && path != "/") {

            element.addClass('active-main');
            if(idx > 0){
                $(this).closest('li').prev().addClass('active-before');
                $(this).closest('li').next().addClass('active-after');
            } else {
                $('.sidebar-header-sub').addClass('active-before');
                $(this).closest('li').next().addClass('active-after');
            }
        }
    });
}

function setSideNavigation(){
    var root = window.location;
    var path = root.search.substring(1).split('=')[1];
    if(path == undefined)
        var path = root.pathname.replace("/\/$/","");
    path = decodeURIComponent(path);

    $('.sidebar-header').removeClass('active-before');

    $('#sidebar ul.nav-list > li').each(function(idx, li) {
        var element = $(li);
        var href = element.find('a').attr('href');
        element.removeClass('active-main active-after active-before');
        element.find('ul').removeClass('show');

        if((path.indexOf(href) >= 0 || href.indexOf(path) >= 0) && path != "/") {

            element.addClass('active-main');
            if(idx > 0){
                $(this).closest('li').prev().addClass('active-before');
                $(this).closest('li').next().addClass('active-after');
            } else {
                $('.sidebar-header-sub').addClass('active-before');
                $(this).closest('li').next().addClass('active-after');
            }
           
            // if(element.find('a').hasClass('openSubNav')){
            //     element.find('ul').addClass('show');
            // }
        }
    });
}

function openCloseSideNavigation (){
    $('#sidebarCollapse').on('click', function () {
        // add, remove active class
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');

        // // dong mo sub menu neu co
        // $('.collapse.in').toggleClass('in');
        // // chinh arrows dung huong
        // $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        // $('a[aria-expanded=false]').attr('aria-expanded', 'true');
    });

    // $('#btn_navbarSupportedContent').on('click', function () {
    //     $('#navbarSupportedContent').toggleClass('show');
    // });
}

function chartHandle (){
    
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    // var users = JSON.parse("{{ json_encode($users) }}");
    // var data = 
  
    const attachData = {
      labels: labels,
      datasets: [{
        label: 'UserChart',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45],
      }]
    };
  
    const config = {
      type: 'line',
      data: attachData,
      options: {}
    };

    
    const myChart = new Chart(
        document.getElementById('userChart'),
        config
    );
}