var protocolo =  window.location.protocol;

var url_server = "//www.rociolourdes.hostoi.com/";

var url_proccess = url_server + "proccessadmin.php";

var url_images = url_server + 'img/';
var url_book = url_server + 'book/';
var url_mini = url_server + 'mini/';
var url_ppal = url_server + 'ppal/';
var url_images = url_server + 'img/';
var url_composite = url_server + 'composite/';


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
