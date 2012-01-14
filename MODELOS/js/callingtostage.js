// Inicializacion de elementos de las paginas
$(document).ready(function() {
  // Ocultamos elementos del selector de modelos
  $("#modelselector label, #modelselector span").addClass("hide2");
  // cargamos scroll personalizado para listado de modelos
  $(function()
	{
		$('#primerplano').jScrollPane();
	});
});