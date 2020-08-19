
function activarPago(){
				//alert("hola");
				var cursoGratis= document.getElementById("chechboxCurso");
				
				var costoPago= document.getElementById("costoCurso");

				if(cursoPago.value==1){
					costoPago.disabled=true;

				}else{
					costoPago.disabled=true;
				}
				
				console.log(cursoGratis);
				console.log(cursoPago);
				
			}
function mostrar(){
	document.getElementById("pago").style.display="block";
}
function ocultar(){
	document.getElementById("pago").style.display="none";
}			
function mostrarOcultar(){
	var cursoGratis= document.getElementById("pago");
	var cursoGratisC= document.getElementById("chechboxCurso");
	if (cursoGratis.style.display=="none"&&cursoGratisC.value==2) {
		mostrar();
	}else{
		ocultar();
	}
}



