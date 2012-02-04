var protocolo =  window.location.protocol;
var url_server = "//www.rociolourdes.hostoi.com/";

var url_print = url_server + "print.php";

var url_proccess = url_server + "proccess.php";
var url_images = url_server + 'img/';

var url_book = url_server + 'book/';
var url_mini = url_server + 'mini/';
var url_ppal = url_server + 'ppal/';
var url_composite = url_server + 'composite/';

jQuery(document).ready(function() {

		
	jQuery("input[name='sex']").live('click', function(e){
			var otroOp = jQuery("input[name='sex']:checked").attr('id');
			if (otroOp=="male"){
				jQuery('#bust').val('');
				jQuery('#bust').attr('disabled','disabled');
				jQuery("#chest").removeAttr('disabled');
			}else{
				if (otroOp=="female"){
					jQuery('#chest').val('');
					jQuery("#bust").removeAttr('disabled');
					jQuery("#chest").attr('disabled','disabled');
				}
			}
	});

	jQuery("#find_a_model").live('change', function(e){
		var idM = jQuery("#find_a_model option:selected").val();
		if (idM!=''){
			switch(idM){
				case 'women':
					top.location.href=url_server+'women.php';
				break;
				case 'men':
					top.location.href=url_server+'men.php';
				break;
				case 'special_booking':
					top.location.href=url_server+'special_booking.php';
				break;
				default:
					var valueM = idM.substr(2,idM.length);
					top.location.href=url_server+'model_selected.php?model_id='+valueM;
				break;
			}
		}
	});	
	
	jQuery("#alfabeto li a").live('click', function(){
		var nameC = $(this).text();
		if (nameC!=''){
			if (nameC != 'ALL'){
				$('#primerplano li').each(function(i){
					var nameLi = $(this).find('strong').attr('id');
					var nameLi2 = nameLi.substr(2,1);
					//if (nameLi2.indexOf(nameC)==-1) {
					if (nameLi2!=nameC){
						$(this).removeClass('active_model');
						$(this).hide();
					}else{
						$(this).show();
						$(this).addClass('active_model');
					}
				});
				$('#alfabeto li a').removeClass('selected_letter');
				$(this).addClass('selected_letter');
			}else{
				$('#primerplano li').each(function(i){
					if (!$(this).hasClass('active_model')){
						$(this).show();
						$(this).addClass('active_model');
					}
				});
				$('#alfabeto li a').removeClass('selected_letter');
				$(this).addClass('selected_letter');
			}
			if ($('#primerplano').length) {
				$('#primerplano').jScrollPane();
			}		
		}
	});
		

});//