function iniciar_sesion(){
    window.location.href= "login.php";
}

function cerrar_sesion(){
    window.location.href = "php/cerrar_sesion.php"
}

// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();