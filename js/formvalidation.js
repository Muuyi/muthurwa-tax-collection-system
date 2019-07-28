$(document).ready(function(){
	var cform = $("#customerForm");
	var fname = $("#fname");
	var lname = $("#lname");
	var phone = $("#cphone");
	var passport = $("#cpassport");
	var idnumber = $("#cnumber");
	var email = $("#email");
	var institution = $("#cinstitution");
	var pfname = $("#pfname");
	var plname = $("#plname");
	var pphone = $("#pphone");
	var croom = $("#croom");
	var names = $("#names");
	var mes = $("#mes");
	//Customer form validation
	fname.blur(validateFName);
	lname.blur(validateLName);
	phone.blur(validatePhone);
	idnumber.blur(validateIdNumber);
	email.blur(validateEmail);
	institution.blur(validateInstitution);
	pfname.blur(validatePfname);
	plname.blur(validatePlname);
	pphone.blur(validatePphone);
	croom.blur(validateCroom);
	names.blur(validateName);
	//passport.change(validateImage);

	fname.keyup(validateFName);
	lname.keyup(validateLName);
	phone.keyup(validatePhone);
	email.keyup(validateEmail);
	institution.keyup(validateInstitution);
	pfname.keyup(validatePfname);
	plname.blur(validatePlname);
	pphone.keyup(validatePphone);
	croom.keyup(validateCroom);
	mes.keyup(validateMessage);
	names.keyup(validateName);
	//passport.load(validateImage);
	//passport.submit(validateImage);
	//ENSURING THAT THE CLIENTS FORM IS VALIDATED BEFORE SUBMISSION
	cform.submit(function(){
		if(validateName() & validatePhone() & validateIdNumber() & validateInstitution() & validatePname() & validatePphone() & validateCroom() & validateEmail()){
			return true;
		}else{
			return false;
		}
	});
	//FULL NAME VALIDATION
	function validateFName(){
		var fname = document.getElementById("fname");
		var regex = /^[A-Za-z]{2,15}$/;
		var fMatch = regex.exec(fname);
		if(fname.value == ""){
			$("#fnameresponse").html("<p style='color:#FF0000;'>Please enter your first name!</p>");
			$('#fname').addClass('warning_bd');
			return false;
		}else if(fname.value.length < 3){
			$("#fnameresponse").html("<p style='color:#FF0000;'>Please enter a valid first name atleast 3 characters long</i></P>");
			$("#fname").addClass('warning_bd');
			return false;
		}else if(fMatch.value == false){
			console.log(fmatch);
			$("#fnameresponse").html("<p style='color:#FF0000;'>Only characters are allowed</i></P>");
			$("#fname").addClass('warning_bd');
			return false;
		}else{
			$("#fnameresponse").empty();
			$("#fname").removeClass("warning_bd");
			return true;
		}
	}
	function validateLName(){
		if(lname.val() == ""){
			$("#lnameresponse").html("<p style='color:#FF0000;'>Please enter your last name!</p>");
			$('#lname').addClass('warning_bd');
			return false;
		}else if(lname.val().length < 3){
			$("#lnameresponse").html("<p style='color:#FF0000;'>Please enter a valid last name atleast 3 characters long</P>");
			$('#lname').addClass('warning_bd');
			return false;
		}else{
			$("#lnameresponse").empty();
			$("#lname").removeClass("warning_bd");
			return true;
		}
	}
	//PHONE NUMBER VALIDATION
	function validatePhone(){
		if(phone.val() == ""){
			$("#phoneresponse").html("<p style='color:#FF0000;'>Please enter  your phone number!</P>");
			$("#cphone").addClass('warning_bd');
			return false;
		}else if(phone.val().length != 10){
			$("#phoneresponse").html("<p style='color:#FF0000;'>Please enter a ten digit number e.g <i>0712345678</i></p>");
			$("#cphone").addClass('warning_bd');
			return false;
		}else{
			$("#phoneresponse").empty();
			$("#cphone").removeClass("warning_bd");
			return true;
		}
	}
	//ID NUMBER VALIDATION
	function validateIdNumber(){
		if(idnumber.val() == ""){
			$("#idresponse").html("<p style='color:#FF0000;'>Please enter  your ID number!</p>");
			$("#cnumber").addClass('warning_bd');
			return false;
		}else if(idnumber.val().length != 8){
			$("#idresponse").html("<p style='color:#FF0000;'>Please enter an 8 digit ID  number e.g <i>23456789</i></p>");
			$("#cnumber").addClass('warning_bd');
			return false;
		} else {
			$("#idresponse").empty();
			$("#cnumber").removeClass('warning_bd');
			return true;
		}
	}
	//EMAIL VALIDATION
	function validateEmail(){
		if(email.val() == ""){
			$("#emailresponse").html("<p style='color:#FF0000;'>Please enter your email address!</p>");
			$("#email").addClass('warning_bd');
			return false;
		}else if(!email.match(/^[A-Za-z\.\-_0-9]*[@][A-Za-z]*[.][a-z]{2,5}$/)){
			$("#emailresponse").html("<p style='color:#FF0000;'>Please enter a valid email address e.g <i>michael@gmail.com</i></P>");
			$("#email").addClass('warning_bd');
			return false;
		}else{
			$("#emailresponse").empty();
			$("#email").removeClass('warning_bd');
			return true;
		}
	}
	//INSTITUTION VALIDATION
	function validateInstitution(){
		if(institution.val() == ""){
			$("#institutionresponse").html("<p style='color:#FF0000;'>Please enter  your institution's name!</p>");
			$("#cinstitution").addClass('warning_bd');
			return false;
		} else {
			$("#institutionresponse").empty();
			$("#cinstitution").removeClass('warning_bd');
			return true;
		}
	}
	//PARENTS NAME VALIDATION
	function validatePfname(){
		if(pfname.val() == ""){
			$("#pfnameresponse").html("<p style='color:#FF0000;'>Please enter  your parent's/guardian's full names!</p>");
			$('#pfname').addClass('warning_bd');
			return false;
		}else if(pfname.val().length < 3){
			$("#pfnameresponse").html("<p style='color:#FF0000;'>Please enter a valid full name e.g.<i> Michael Jordan</i></p>");
			$('#pfname').addClass('warning_bd');
			return false;
		} else {
			$("#pfnameresponse").empty();
			$('#pfname').removeClass('warning_bd');
			return true;
		}
	}
	function validatePlname(){
		if(plname.val() == ""){
			$("#plnameresponse").html("<p style='color:#FF0000;'>Please enter  your parent's/guardian's full names!</p>");
			$('#plname').addClass('warning_bd');
			return false;
		}else if(plname.val().length < 3){
			$("#plnameresponse").html("<p style='color:#FF0000;'>Please enter a valid full name e.g.<i> Michael Jordan</i></p>");
			$('#plname').addClass('warning_bd');
			return false;
		} else {
			$("#plnameresponse").empty();
			$('#plname').removeClass('warning_bd');
			return true;
		}
	}
	//PHONE NUMBER VALIDATION
	function validatePphone(){
		if(pphone.val() == ""){
			$("#pphoneresponse").html("<p style='color:#FF0000;'>Please enter a your parents/guardians phone number!</p>");
			$("#pphone").addClass('warning_bd');
			return false;
		}else if(pphone.val().length != 10){
			$("#pphoneresponse").html("<p style='color:#FF0000;'>Please enter a ten digit number e.g. <i>0712345678</i></p>");
			$("#pphone").addClass('warning_bd');
			return false;
		} else {
			$("pphoneresponse").empty();
			$("#pphone").removeClass('warning_bd');
			return true;
		}
	}
	//CLIENTS ROOM VALIDATION
	function validateCroom(){
		if(croom.val() == "default"){
			$("#roomresponse").html("<p style='color:#FF0000;'>Please select your room!</p>");
			$("#croom").addClass('warning_bd');
			return false;
		} else {
			$("#roomresponse").empty();
			$("#croom").removeClass('warning_bd');
			return true;
		}
	}
	
	//CHECKING IF THE ID NUMBER EXISTS IN THE DATABASE
	$("#cnumber").keyup(function(){
		var idnumber = $("#cnumber").val();
		$.post('checkid.php',{idnumber:idnumber},
		function (data){
			$("#idresponse").html(data);
		});
	});
	//VALIDATE MESSAGE
	function validateMessage(){
		var mes = $("mes").val();
		var required = 200;
		var left = required - mes.length;
		if(left > 0){
			$("#mesresponse").html("<p style='color:#FF0000;'>"+left+" characters required!</p>");
		}
	}
	//FULL NAMES VALIDATION
	function validateName(){
		var names = document.getElementById("names");
		$cnames = names.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/);
		if(names.val() == ""){
			$("#namesresponse").html("<p style='color:#FF0000;'>Please enter full names!</p>");
		}else if(!cnames){
			$("#namesresponse").html("<p style='color:#FF0000;'>Please enter a valid first and last name. Only characters and spaces allowed!</p>");
		}
	}
	//IMAGE VALIDATION
	$(document).on('change', '#cpassport', function(){
		var property = document.getElementById("cpassport").files[0];
		var singleName = property.name;
		var size = property.size;
		var ext = singleName.split('.').pop().toLowerCase();
		if(jQuery.inArray(ext, ['jpg','jpeg']) == -1){
			$("#passportresponse").html("Invalid image format.Only jpg/jpeg allowed!")
			$("cpassport").val() == "";
		}else if(size > 1000000){
			$("#passportresponse").html("This file image is too large. Only a maximum of 1MB is allowed!");
			$("cpassport").val() == "";
		}else{
			$("#passportresponse").empty();
		}
	});
	
});
//ALLOWING NUMBERS ONLY IN PHONE NUMBERS AND ID NUMBER
function numbersOnly(input){
	var regex = /^[a-z\'<>]/g;
	input.value = input.value.replace(regex, "");
}
