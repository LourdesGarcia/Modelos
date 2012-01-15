// Inicializacion de elementos de las paginas
$(document).ready(function() {
  	// Ocultamos elementos del selector de modelos
	$("#modelselector label, #modelselector span").addClass("hide2");
  	// cargamos scroll personalizado para listado de modelos si es necesario
	if ($('#primerplano').length) {
		$('#primerplano').jScrollPane();
	}

  	// Ejecutamos carrusel si es necesario
	if ($('#pikame').length) {
		$("#pikame").PikaChoose({carousel:true, showTooltips:true, autoPlay:false});
	}
	
	// Fancybox para videos
	
	if ($('#listavideos').length) {
		$("#listavideos a").click(function() {
			$.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'none',
					'transitionOut'	: 'none',
					'title'			: this.title,
					'width'		: 680,
					'height'		: 495,
					'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
					'type'			: 'swf',
					'swf'			: {
						 'wmode'		: 'transparent',
						'allowfullscreen'	: 'true'
					}
				});
		
			return false;
		});	
	}
	
	
	


});