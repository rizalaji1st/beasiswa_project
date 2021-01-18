  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
  </script>
  <!-- General JS Scripts -->
<script src="{{url('dashboard/modules/jquery.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('backend/vendor/fstdropdown/js/fstdropdown.min.js')}}"></script>
<script src="{{url('dashboard/modules/popper.js')}}"></script>
<script src="{{url('dashboard/modules/tooltip.js')}}"></script>
<script src="{{url('dashboard/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('dashboard/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{url('dashboard/modules/moment.min.js')}}"></script>
<script src="{{url('dashboard/js/stisla.js')}}"></script>
<script src="{{url('dashboard/modules/jquery.sparkline.min.js')}}"></script>
<script src="{{url('dashboard/modules/chart.min.js')}}"></script>
<script src="{{url('dashboard/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script src="{{url('dashboard/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{url('dashboard/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{url('dashboard/js/page/index.js')}}"></script>
<script src="{{url('dashboard/js/scripts.js')}}"></script>
<script src="{{url('dashboard/js/custom.js')}}"></script>
<script src="{{url('dashboard/js/page/bootstrap-modal.js')}}"></script>

<script>
    jQuery(document).ready(function($) {
    
                $("#bea").change(function () {
                            var ref =$(this).find('option:selected').attr('value');
                            var link = "/pendaftar/penawaran/detail/"
                            $('#link').attr('href', link + ref);
    
                });
    
            });

</script>