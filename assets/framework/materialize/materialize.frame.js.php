<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo RAIZ ?>assets/framework/materialize/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo RAIZ ?>assets/framework/materialize/js/materialize.min.js"></script>

<!-- Inicialização de arquivos  -->
<script>
////// Inicialização e configuração do airDatepicker //////
$('.inputDataAir').datepicker({
    language: 'pt-BR',
    minDate: new Date() // Now can select only dates, which goes after today
});
// Materialize //
$(document).ready(function() {
    $('select').material_select();
  });
</script>