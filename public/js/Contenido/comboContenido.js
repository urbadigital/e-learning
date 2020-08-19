


function getSelectValue(){

				var selectedValue= document.getElementById("curso_id").value;
				
				//console.log('hola'+selectedValue);
				if(selectedValue==""){
					//alert("no exite id");
					var html_select_vacio = '<option value="">Seleccione el contenido del test</option>';
					document.getElementById("contenido_id").innerHTML = html_select_vacio;
					console.log(html_select_vacio);
					
				}else

			$.get('/api/curso/'+selectedValue+'/contenido',function(data){
				
				//console.log(data)
				//alert(selectedValue);
				//alert("si exite id");
					var html_select = '<option value="">Seleccione el contenido del test</option>';
				for (var i = 0; i <data.length; i++) {

					 	html_select += '<option value="'+data[i].id+'">'+data[i].nombre_contenido+'</option>';
					 //html_select += '<option value="'+data[i].id+'">'+data[i].nombre_canton+'</option>';
				}
				document.getElementById("contenido_id").innerHTML = html_select;
				//console.log(html_select);
				
				

			});
			} 




