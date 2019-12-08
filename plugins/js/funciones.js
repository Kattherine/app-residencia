//FUNCION PARA VALIDAR EL EMAIL
function validaremail(dni){
 
	var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

	 if (emailRegex.test(dni)) {
      return true;
    } else {
      return false;
    }

}

//FUNCION PARA VALIDAR EL TELEFONO
function validartelefono(tlf){
 
	var emailRegex = /^([9,7,6]{1})+([0-9]{8})$/;

	 if (emailRegex.test(tlf)) {
      return true;
    } else {
      return false;
    }

}

//FUNCION PARA VALIDAR EL DNI, NIF O NIE
function validar_dni_nif_nie(value){
 
	  var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
	  var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
	  var nieRexp = /^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
	  var str = value.toString().toUpperCase();

	  if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

	  var nie = str
		  .replace(/^[X]/, '0')
		  .replace(/^[Y]/, '1')
		  .replace(/^[Z]/, '2');

	  var letter = str.substr(-1);
	  var charIndex = parseInt(nie.substr(0, 8)) % 23;

	  if (validChars.charAt(charIndex) === letter) return true;

	  return false;
}
