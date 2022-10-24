$(document).ready(function () {
    // $('#sidebar').mCustomScrollBar({
    //     theme: "minimal"
    // });
    $('.container').attr('style', '');

    $('#sidebarCollapse').on('click', function () {
        // add, remove active class
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');

        // dong mo sub menu neu co
        $('.collapse.in').toggleClass('in');
        // chinh arrows dung huong
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        $('a[aria-expanded=false]').attr('aria-expanded', 'true');
    });

    $('#btn_navbarSupportedContent').on('click', function () {
        $('#navbarSupportedContent').toggleClass('show');
    });
});
