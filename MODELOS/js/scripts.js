var protocolo =  window.location.protocol;
var url_print = "//rociolourdes.hostoi.com/print.php";

var url_proccess = "//rociolourdes.hostoi.com/proccess.php";
var url_images = 'http://www.rociolourdes.hostoi.com/img/';

jQuery(document).ready(function() {

	  	// Ocultamos elementos del selector de modelos

	jQuery("input[name='sex']").live('click', function(e){
			var otroOp = jQuery("input[name='sex']:checked").attr('id');
			if (otroOp=="male"){
				jQuery('#bust').val('');
				jQuery('#waist1').val('');
				jQuery('#hips').val('');
				jQuery('#bust').attr('disabled','disabled');
				jQuery('#hips').attr('disabled','disabled');
				jQuery('#waist1').attr('disabled','disabled');
				jQuery("#collar").removeAttr('disabled');
				jQuery("#chest").removeAttr('disabled');
				jQuery("#waist2").removeAttr('disabled');
			}else{
				if (otroOp=="female"){
					jQuery('#collar').val('');
					jQuery('#chest').val('');
					jQuery('#waist2').val('');
					jQuery("#bust").removeAttr('disabled');
					jQuery("#hips").removeAttr('disabled');
					jQuery("#waist1").removeAttr('disabled');
					jQuery("#collar").attr('disabled','disabled');
					jQuery("#chest").attr('disabled','disabled');
					jQuery("#waist2").attr('disabled','disabled');
				}else{
					alert('otro');
				}
			}
	});
		
	jQuery(".submitButton").live('click', function(e){
		var first_name = jQuery('#first_name').val();
		var last_name = jQuery('#last_name').val();
		var address = jQuery('#address').val();
		var address_cont = jQuery('#address_cont').val();
		address = address + ' ' + address_cont;
		var phone_number = jQuery('#phone_number').val();
		var mobile = jQuery('#mobile').val();
		var gender = jQuery("input[name='sex']:checked").attr('id');
		var age = jQuery('#age').val();
		var height = jQuery('#height').val();
		var bust = jQuery('#bust').val();
		var waist1 = jQuery('#waist1').val();
		var hips = jQuery('#hips').val();
		var zip_code = jQuery('#zip_code').val();
		var city = jQuery('#city').val();
		var the_state = jQuery('#the_state').val();
		var email = jQuery('#email').val();
		var hair_color = jQuery('#hair_color').val();
		var eyes_color = jQuery('#eyes_color').val();
		var collar = jQuery('#collar').val();
		var chest = jQuery('#chest').val();
		var waist2 = jQuery('#waist2').val();
		var headshot_photo = jQuery('#headshot_photo').val();
		var full_length_photo = jQuery('#full_length_photo').val();
		var checkLB = jQuery("#checkLB").attr('checked'); 
		checkData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo,checkLB);
	});
	
	jQuery("#menu li a").live('click', function(e){
		var menuId = jQuery(this).attr('id');
		$('#menu li a').removeClass('selected_menu');
		jQuery(this).addClass('selected_menu');
		var letter = jQuery(this).attr('id');
		jQuery('.menus').hide();
		if ((menuId == 'women')||(menuId == 'men')|| (menuId == 'special_booking')){
			$('#alfabeto').show();
			$('#alfabeto li a').removeClass('selected_letter');
			jQuery('#all').addClass('selected_letter');
			showAllModels(menuId);
			jQuery('#menu_models').show();
		}else{
			
			$('#menu_'+menuId).show();
			$('#alfabeto').hide();
		}
		$('#model_selected').hide();
	});
	
	jQuery("#alfabeto li a").live('click', function(e){
		var menu_sel = $('#menu .selected_menu').attr('id');
		$('#alfabeto li a').removeClass('selected_letter');
		jQuery(this).addClass('selected_letter');
		var letter = jQuery(this).text();
		if (letter == 'ALL'){
			showAllModels(menu_sel);
		}else{
			showModelByLetter(menu_sel,letter);
		}
	});
	
	jQuery(".models_guide ul li a").live('click', function(e){
		var model = $(this).attr('id');
		var modelId = model.substr(11,model.length);
		showCompleteDataModel(modelId);
		//showPrint(modelId,url_photo);
	});
	
	jQuery(".models_guide ul li a img").live('click', function(e){
		var model = $(this).attr('id');
		var modelId = model.substr(3,model.length);
		showCompleteDataModel(modelId);
		//showPrint(modelId,url_photo);
	});
	
	jQuery(".pika-stage img").live('click', function(e){
		var url_photo = $(this).attr('src');
		var model = $('#m_name label').attr('id');
		var modelId = model.substr(2,model.length);
		showPrint(modelId,url_photo);	
	});
	
	jQuery("#find_a_model").live('change', function(e){
		var idM = jQuery("#find_a_model option:selected").val();
		if (idM!=''){
			if ((idM=='women')||(idM=='men')||(idM=='special_booking')){
				$('#alfabeto').show();
				$('#alfabeto li a').removeClass('selected_letter');
				jQuery('#all').addClass('selected_letter');
				showAllModels(idM);
				jQuery('#menu_models').show();
				jQuery('#menu_'+idM).show();
				jQuery('#menu li a').removeClass('selected_menu');
				jQuery('#menu li #'+idM).addClass('selected_menu');
				$('#model_selected').hide();
			}else{
				var valueM = idM.substr(2,idM.length);
				showCompleteDataModel(valueM);
				$('#model_selected').show();
			}
		}
	});	

	/////////////////////
	/* jQuery('#photos_model ul li a').live('click', function(e){
		var urlMini = $(this).find('label').text();
		//alert(urlMini);
		jQuery('#model_selected #big_photo img').attr('src',urlMini);
	}); */

	jQuery("#saltar_intro").live('click', function(e){
		jQuery('.menus').hide();
		$('#alfabeto').show();
		$('#alfabeto li a').removeClass('selected_letter');
		jQuery('#all').addClass('selected_letter');
		jQuery('#menu_models').show();
		jQuery('#menu li a').removeClass('selected_menu');
		jQuery('#menu li #women').addClass('selected_menu');
		$('#model_selected').hide();
	});
	
	
});//

function showCompleteDataModel(model_id){
	var dataString = 'model_id=' + model_id + '&request_type=showCompleteDataModel';
	$.ajax({
		type: "POST",
		url: protocolo + url_proccess,
		data: dataString,
		dataType: "json",
		cache: false,
		error: function(a, b, c){
				alert('a: ' + a + ',b: ' + b + ',c: ' +c );
		},
		success: function(result){
			if (result.res == "SUCCESS"){
				$('.menus').hide();
				$('#alfabeto').hide();
				$('#model_selected').show();
				if (result.datos.length>0){
					var i;
					$('#m_name').find('label').remove();
					$('#m_data').find('dt, dd').remove();
					for(i=0;i<result.datos.length;i++){
						$('<label id="l_'+result.datos[i].id+'">'+result.datos[i].first_name.toUpperCase()+' <strong>'+result.datos[i].last_name.toUpperCase()+'</strong></label>').appendTo('#m_name');
						if (result.datos[i].gender == 'female'){
							//var data_gender = '<strong>Bust</strong>: '+result.datos[i].bust+' <br><strong>Hips</strong>: '+result.datos[i].hips;
							var data_gender = '<dt>Bust:</dt><dd>'+result.datos[i].bust+'</dd><dt>Hips:</dt><dd>'+result.datos[i].hips+'</dd>';
						}else{
							//var data_gender = '<strong>Collar</strong>: '+result.datos[i].collar+' <br><strong>Chest</strong>: '+result.datos[i].chest;
							var data_gender = '<dt>Collar:</dt><dd>'+result.datos[i].collar+'</dd><dt>Chest:</dt><dd>'+result.datos[i].chest+'</dd>';
						}
						//$('<div id="name_model">'+result.datos[i].first_name.toUpperCase()+' '+result.datos[i].last_name.toUpperCase()+'</div><div id="more_data"> <strong>Height</strong>: '+result.datos[i].height+'<br>'+data_gender+'<br><strong>Waist</strong>: '+result.datos[i].waist+'<br><strong>Eyes Color</strong>: '+result.datos[i].eyes_color+'<br><strong>Hair Color</strong>: '+result.datos[i].hair_color+'<br></div>').appendTo('#book');
						$('<dt>Height:</dt><dd>'+result.datos[i].height+'</dd><dt>Waist:</dt><dd>86</dd>'+data_gender+'<dt>Eye color:</dt><dd>'+result.datos[i].eyes_color+'</dd><dt>Hair color:</dt><dd>'+result.datos[i].hair_color+'</dd>').appendTo('#m_data');
					}
				}
				$('#listavideos').find('li').remove();
				if (result.videos.length>0){
					var i;
					for(i=0;i<result.videos.length;i++){
						//$('<div><a href="'+result.videos[i].url_youtube+'" target="_blank"><img src="'+url_images+'FR.jpg"/></a>'+result.videos[i].video_name+'<div>').appendTo('#youtube_model');
						$('<li><a id="v_'+result.videos[i].id+'" href="'+result.videos[i].url_youtube+'"><img src="'+url_images+'thumbnail_video.gif" alt="xxx" />'+result.videos[i].video_name+'</a></li>').appendTo('#listavideos');
					}
				}
				$('#galeria #pikame').find('li').remove();
				if (result.photos.length>0){
					var i;
					var cont = 1;
					$('#galeria .pika-stage').find('img').attr('src',result.photos[0].url_photo);
					for(i=0;i<result.photos.length;i++){
							//$('<li id="photo'+result.photos[i].id+'"><a id="link_photo_'+result.photos[i].id+'"><img src="'+result.photos[i].url_thumbnail+'" /><label style="display:none">'+result.photos[i].url_photo+'</label></a></div></li>').appendTo('#photos_model ul');
						//$('<li id="photo'+result.photos[i].id+'"<a><img src="'+result.photos[i].url_thumbnail+'" ref="'+result.photos[i].url_photo+'" alt="XXX"/></a><span>Click aquí para imprimir esta fotografía.</span></li>').appendTo('#galeria #pikame');
						//$('<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-'+cont+' jcarousel-item-'+cont+'-horizontal" jcarouselindex="'+cont+'" id="photo'+result.photos[i].id+'"><div class="clip"><a><img src="'+result.photos[i].url_thumbnail+'" ref="'+result.photos[i].url_photo+'" alt="XXX"/></a></div></li>').appendTo('#galeria #pikame');
						$("#pikame").append('<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-'+cont+' jcarousel-item-'+cont+'-horizontal" jcarouselindex="'+cont+'" id="photo'+result.photos[i].id+'"><div class="clip"><a><img src="'+result.photos[i].url_thumbnail+'" ref="'+result.photos[i].url_photo+'" alt="XXX"/></a></div></li>');
						cont++;
					}
					$("#pikame").data('pikachoose').updateThumbs();
					$("#pikame").data('pikachoose').bindEvents();
					
				}
				
			/*
				$('#galeria').show();
				
						var a = function(self){
				  self.anchor.fancybox();
			   };
			   $("#pikame").PikaChoose({buildFinished:a});
			   */
			   /*
					//adds your image
					$(".pikame").append('<li><img src="../../4.jpg"></li>');
					//resizes the thumbnails
					$(".pikame").data('pikachoose').updateThumbs();
					//makes the clicks work on thumbs
					$(".pikame").data('pikachoose').bindEvents();
			   */
			   
				if (jQuery('#listavideos').length) {
					jQuery('#listavideos a').click(function() {
						jQuery.fancybox({
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
			}
		}
	}); //ajax
	/*if (jQuery('#pikame').length) {
		jQuery('#pikame').PikaChoose({carousel:true, showTooltips:true, autoPlay:false});
	}
	*/ 
	//$("#pikame").PikaChoose({auto_play:true, IESafe: true});
	
}

function showAllModels(menu_sel){
	var dataString = 'menu_sel=' + menu_sel + '&request_type=showAllModels';
	$.ajax({
		type: "POST",
		url: protocolo + url_proccess,
		data: dataString,
		dataType: "json",
		cache: false,
		error: function(a, b, c){
				alert('a: ' + a + ',b: ' + b + ',c: ' +c );
		},
		success: function(result){
			if (result.res == "SUCCESS"){
				//MOSTRAR TODOS LOS MODELOS QUE CORRESPONDEN A ESE TIPO
				$('#menu_models').find('li').remove();
				if (result.modelos.length>0){
					var i;
					for(i=0;i<result.modelos.length;i++){
						//$('<li id="model_'+result.modelos[i].id+'"><a id="link_model_'+result.modelos[i].id+'">Nombre: '+result.modelos[i].first_name.toUpperCase()+'</a><br><label>Apellido: '+result.modelos[i].last_name.toUpperCase()+'</label><br><label>Url imagen de cara: '+result.modelos[i].url_headshot_photo+'</label><br><label>Url imagen de cuerpo entero: '+result.modelos[i].url_full_length_photo+'</a></li>').appendTo('#menu_'+menu_sel+' ul');
						$('<li id="model_'+result.modelos[i].id+'"><a id="link_model_'+result.modelos[i].id+'"><img id="'+result.modelos[i].id+'" src='+result.modelos[i].url_headshot_photo+' alt="'+result.modelos[i].first_name+'_'+result.modelos[i].last_name+'" /><strong>'+result.modelos[i].first_name+' '+result.modelos[i].last_name+'</strong></a></li>').appendTo('#primerplano .jspContainer .jspPane');
					}
				}
			}
		}
	}); //ajax
}

function showModelByLetter(menu_sel,letter){
	var dataString = 'menu_sel=' + menu_sel + '&letter=' + letter + '&request_type=showModelsByLetter'; 
	$.ajax({
		type: "POST",
		url: protocolo + url_proccess,
		data: dataString,
		dataType: "json",
		cache: false,
		error: function(a, b, c){
				alert('a: ' + a + ',b: ' + b + ',c: ' +c );
		},
		success: function(result){
			if (result.res == "SUCCESS"){
				$('#menu_models').find('li').remove();
				if (result.modelos.length>0){
					var i;
					for(i=0;i<result.modelos.length;i++){
						//$('<li id="model_'+result.modelos[i].id+'"><a id="link_model_'+result.modelos[i].id+'">Nombre: '+result.modelos[i].first_name.toUpperCase()+'</a><br><label>Apellido: '+result.modelos[i].last_name.toUpperCase()+'</label><br><label>Url imagen de cara: '+result.modelos[i].url_headshot_photo+'</label><br><label>Url imagen de cuerpo entero: '+result.modelos[i].url_full_length_photo+'</a></li>').appendTo('#menu_'+menu_sel+' ul');
						$('<li id="model_'+result.modelos[i].id+'"><a id="link_model_'+result.modelos[i].id+'"><img src="'+result.modelos[i].url_headshot_photo+'" alt="'+result.modelos[i].first_name+'_'+result.modelos[i].last_name+'" /><strong>'+result.modelos[i].first_name+' '+result.modelos[i].last_name+'</strong></a></li>').appendTo('#primerplano .jspContainer .jspPane');
					}
				}
			}else{
				//QUITAR ALERT Y PONER POPUP
				alert(result.mensaje); 
			}
		}
	}); //ajax
}

function checkData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo,checkLB){
	var ok = true;
	var textError = ''; 
	if ((first_name=='')||(last_name=='')||(gender==undefined)||(address=='')||(phone_number=='')||(mobile=='')||(age=='')||(height=='')||(zip_code=='')||(city=='')||(the_state=='')||(email=='')||(hair_color=='')||(eyes_color=='')||(headshot_photo=='')||(full_length_photo=='')){
		ok = false;
		textError = 'Todos los campos son obligatorios';
	} else{
		if (!(validatedPhone(phone_number))){
			textError = 'Telefono numerico.';
			ok=false;
		}else{
			if (!(validatedEmail(email))){
				textError = 'Formato de email invalido.';
				ok=false;
			}else{
				if (!(validatedMobile(mobile))){
					textError = 'Movil numerico.';
					ok=false;
				}else{
					if (((gender=='female')&&((bust=='')||(waist1=='')||(hips=='')))||((gender=='male')&&((collar=='')||(chest=='')||(waist2=='')))){
						textError = 'Todos los campos son obligatorios.';
						ok=false;
					}else{
						if (!(validatedZipCode(zip_code))){
							textError = 'Codigo postal numerico';
							ok=false;
						}else{
							if (!(isChecked(checkLB))){
								textError = 'Aceptar los permisos de contacto.';
								ok=false;
							}else{
								sendData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo);
								//$('.adjuntos').submit();
							}
						}
					}
				}
			}
		}
	} 
	if (ok==false){
		//LOS ALERT HAY QUE SUSTITUIRLOS POR UN POPUP QUE DEBEMOS CREAR, YA QUE EN ALGUNOS NAVEGADORES APARECE COMO TITULO DEL ALERT LA URL DEL SERVIDOR.
		if (gender==undefined){
			 jQuery('#bust').val('');
			 jQuery('#waist1').val('');
			 jQuery('#hips').val('');
			 jQuery('#collar').val('');
			 jQuery('#chest').val('');
			 jQuery('#waist2').val('');
		}
		alert(textError);
	}
	//else{
		//$('.adjuntos').submit();
	//}
}

function sendData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo){
	/*var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&address=' + address +
					 '&phone_number=' + phone_number + '&mobile=' + mobile + '&gender=' + gender + '&age=' + age + 
					 '&height=' + height + '&bust=' + bust + '&waist1=' + waist1 + '&hips=' + hips + 
					 '&zip_code=' + zip_code + '&city=' + city + '&the_state=' + the_state + '&email=' + email + 
					 '&hair_color=' + hair_color + '&eyes_color=' + eyes_color + '&collar=' + collar + '&chest=' + chest + 
					 '&waist2=' + waist2 + '&headshot_photo=' + headshot_photo + '&full_length_photo=' + full_length_photo + 
					 '&request_type=submitForm'; 
	$.ajax({
		type: "POST",
		url: protocolo + url_proccess,
		data: dataString,
		dataType: "json",
		cache: false,
		error: function(a, b, c){
				alert('a: ' + a + ',b: ' + b + ',c: ' +c );
		},
		success: function(result){
			if (result.res == "SUCCESS"){
				alert('todo esta ok');
			}else{
				//QUITAR ALERT Y PONER POPUP
				alert(result.mensaje); 
			}
		}
	}); //ajax
	*/
	
}

function showPrint(modelId,url_photo){
	var dataString = 'model_id=' + modelId + '&request_type=showCompleteDataModel';
	$.ajax({
		type: "POST",
		url: protocolo + url_proccess,
		data: dataString,
		dataType: "json",
		cache: false,
		error: function(a, b, c){
				alert('a: ' + a + ',b: ' + b + ',c: ' +c );
		},
		success: function(result){
			if (result.res == "SUCCESS"){
				var i;
				for(i=0;i<result.datos.length;i++){
					top.location.href=protocolo+url_print+'?first_name='+result.datos[i].first_name+'&last_name='+result.datos[i].last_name+'&height='+result.datos[i].height+'&gender='+result.datos[i].gender+'&bust='+result.datos[i].bust+'&waist='+result.datos[i].waist+'&hips='+result.datos[i].hips+'&collar='+result.datos[i].collar+'&chest='+result.datos[i].chest+'&eyes_color='+result.datos[i].eyes_color+'&hair_color='+result.datos[i].hair_color+'&url_photo='+url_photo;
				}
			}	
		}
	}); //ajax
}


/*function goPrint(modelId,first_name,last_name,height,gender,bust,waist,hips,collar,chest,eyes_color,hair_color,url_photo){
	var dataString = 'first_name='+first_name+'&last_name='+last_name+'&height='+height+'&gender='+gender+'&bust='+bust+'&waist='+waist+'&hips='+hips+'&collar='+collar+'&chest='+chest+'&hair_color='+hair_color+'&url_photo='+url_photo;
	$.ajax({
		type: "POST",
		url: protocolo + url_print,
		data: dataString,
		//dataType: "json",
		cache: false,
		error: function(a, b, c){
				alert('a: ' + a + ',b: ' + b + ',c: ' +c );
		},
		success: function(result){
			if (result.res == "SUCCESS"){
				
			}
		}
	}); 
}*/

function cleanInput(){
	$('input').each(function(){
		$(this).val('');
	});
}

function isChecked(checked){
	return checked;
}


function validatedEmail(mail){
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
	var returnval=emailfilter.test(mail);
	return (returnval);
}

function validatedZipCode(p){
	//return ((!isNaN(p))&&(p.length==9)&&(p.substring(0,1)!='9'));
	return (!isNaN(p));
}

function validatedPhone(p){
	//return ((!isNaN(p))&&(p.length==9)&&(p.substring(0,1)!='9'));
	return (!isNaN(p));
}

function validatedMobile(p){
	//return ((!isNaN(p))&&(p.length==9)&&(p.substring(0,1)!='6'));
	return (!isNaN(p));
}
