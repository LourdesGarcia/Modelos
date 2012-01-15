var protocolo =  window.location.protocol;
var url_proccess = "//www.rociolourdes.hostoi.com/proccess2.php";
var url_images = 'http://www.rociolourdes.hostoi.com/img/';

jQuery(document).ready(function() {

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
		var type_model = jQuery("input[name='type']:checked").attr('id');
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
		//sendData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo);
		checkData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo,checkLB,type_model);
	});
	
});//

function checkData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo,checkLB,type_model){
	var ok = true;
	var textError = ''; 
	if ((first_name=='')||(last_name=='')||(gender==undefined)||(address=='')||(phone_number=='')||(mobile=='')||(age=='')||(height=='')||(zip_code=='')||(city=='')||(the_state=='')||(email=='')||(hair_color=='')||(eyes_color=='')||(headshot_photo=='')||(full_length_photo=='')||(type_model==undefined)){
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
							
								sendData(first_name,last_name,address,phone_number,mobile,gender,age,height,bust,waist1,hips,zip_code,city,the_state,email,hair_color,eyes_color,collar,chest,waist2,headshot_photo,full_length_photo,type_model);
							
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
