// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
  $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
    };




    echo '
<script>

    window.open ("https://sandbox.flow.cl/uri/WCJT63Jtv", "_blank");
    </script>
    ';


    
if ($resultado) {
    echo '
            <script>
            window.location="../index.php";
            </script>
        ';
}