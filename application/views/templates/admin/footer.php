</div>
        <!-- End Page wrapper  -->
    </div>
<!-- End Wrapper -->
    <!-- All Jquery -->
    <!-- <script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="<?php echo base_url(); ?>assets/admin/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/morris-chart/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/pignose.init.js"></script>

    <script src="<?php echo base_url(); ?>assets/admin/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <!-- scripit init-->

    <script src="<?php echo base_url(); ?>assets/admin/js/custom.min.js"></script>
    <script>
    $( document ).ready(function() {

        console.log($('.datePicker').remove());

        $('.datePicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            autoclose: true,
            todayHighlight: true
        });

        $(".page-item").click(function(e) {
            var href = $(this).find(".page-link").find("a").attr("href");
            if(href != undefined){
                // console.log(href);
                window.location.assign(href);
            }
        });

        $('.form-valide').submit(function(event){
            if(!confirm("Deseja continuar?")){
                event.preventDefault();
            }
        });
        console.log($("#button_delete"));
        
        $("#button_delete").click(function(event){
            alert("ae");
            if (!confirm("Deseja continuar?")) {
                event.preventDefault();
            }
        })
    });
</script>

</body>

</html>