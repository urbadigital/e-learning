'use strict';
$(document).ready(function() {
    $("#commentForm").bootstrapValidator({
        fields: {
            /*inicioValidacion Subcontenido*/
            nombre_subcontenido: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del Subcontenido es requerido' 
                    },
                    
                },
                required: true,
                minlength: 3
            },
            estado_subcontenido: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione un Estado'
                    }
                }
            },
            contenido_id: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el Contenido al que pertenece el Subontenido'
                    }
                }
            },
            /*fin VALIDACION SUBCONTENIDO*/
            /*Inicio VALIDACION  CONTENIDO*/
            contenido: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del Contenido es requerido'
                    },
                    
                },
                required: true,
                minlength: 3
            },
            estado_contenido: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione un Estado'
                    }
                }
            },
            curso_id: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el Curso al que pertenece el Contenido'
                    }
                }
            },

            /*FIN VALIDACION CONTENIDO*/

            /*INICIO VALIDACION PREGUNTA*/
            descripcion_pregunta: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la pregunta'
                    }
                }
            },
            test_id: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el test al que pertenece la pregunta'
                    }
                }
            },
            estado_pregunta: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el estado de la pregunta'
                    }
                }
            },
            tipo_pregunta: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el tipo de pregunta'
                    }
                }
            },
            respuestaUnica1: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la Respuesta 1'
                    }
                }
            },
            respuestaUnica2: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la Respuesta 2'
                    }
                }
            },
            respuestaUnica3: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la Respuesta 3'
                    }
                }
            },
            respuestaUnica4: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la Respuesta 4'
                    }
                }
            },
            respuestaUnica5: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la Respuesta 5'
                    }
                }
            },
            respuestaUnicaVerdadera: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la respuesta Correcta'
                    }
                }
            },
            solucion_pregunta: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la solucion de la respuesta'
                    }
                }
            },
            respuesta_multiple1: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la respuesta 1'
                    }
                }
            },
            respuesta_multiple2: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la respuesta 2'
                    }
                }
            },
            respuesta_multiple3: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la respuesta 3'
                    }
                }
            },
            respuesta_multiple4: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la respuesta 4'
                    }
                }
            },
            respuesta_multiple5: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la respuesta 5'
                    }
                }
            },
            videos_pregunta: {
                validators: {
                    notEmpty: {
                        message: 'seleccione Una opcion'
                    }
                }
            },
            archivos_pregunta: {
                validators: {
                    notEmpty: {
                        message: 'seleccione Una opcion'
                    }
                }
            },
            
            /*FIN VALIDACION PREGUNTA*/
            username: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del Usuario es requerido'
                    },
                    
                },
                required: true,
                minlength: 3
            },
             nombre_curso: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del Curso es requerido'
                    }
                },
                required: true,
                minlength: 3
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                }
            },
            confirm: {
                validators: {
                    notEmpty: {
                        message: 'Confirm Password is required'
                    },
                    identical: {
                        field: 'password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'The input is not a valid email address'
                    }
                }
            },
            anexo: {
                validators: {
                    notEmpty: {
                        message: 'La imagen del Curso es requerido '
                    }
                }
            },
            costo: {
                validators: {
                    notEmpty: {
                        message: 'El costo del Curso es requerido '
                    }
                }
            },
            val_first_name: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required '
                    }
                }
            },
            lname: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required '
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select a gender'
                    }
                }
            },
            val_address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required '
                    }
                }
            },

            password3: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    }
                },
                required: true,
                minlength: 3
            },
            estado_curso: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione un Estado'
                    }
                }
            },
            tipo_nivel_curso: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el nivel del Curso'
                    }
                }
            },
            tema_id: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione el Tema del Curso'
                    }
                }
            },
            tipo_curso: {
                validators: {
                    notEmpty: {
                        message: 'Seleccione un Tipo del Curso'
                    }
                }
            },
            descripcion_cortas_curso: {
                validators: {
                    notEmpty: {
                        message: 'La descripcion corta del Curso es requerida'
                    },
                    stringLength: {
 
                     min: 30,
 
                     message: 'El nombre debe tener al menos 8'
 
                 }
                }
            },
            descripcion_curso: {
                validators: {
                    notEmpty: {
                        message: 'La descripcion Detallada del Curso es requerida'
                    }
                }
            },
            nombre_video_curso: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del Curso es requerido'
                    }
                }
            },
            val_age: {
                validators: {
                    notEmpty: {
                        message:'Age is required and between 18 to 100'

                    },
                    digits: {
                        message:'Enter only digits '
                    },
                    greaterThan: {
                        value: 18,
                        message:'The age should be greater than or equal to 18 '
                    },
                    lessThan: {
                        value: 100,
                        message:'The age should be less than or equal to 100 '
                    }

                }
            },
            phone1: {
                validators: {
                    notEmpty: {
                        message: 'The home number is required'
                    },
                    regexp: {
                        regexp: /^[0-9]{10}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            phone2: {
                validators: {
                    notEmpty: {
                        message: 'The personal number is required'
                    },
                    regexp: {
                        regexp: /^[0-9]{10}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            phone3: {
                validators: {
                    notEmpty: {
                        message: 'Alternate number is required'
                    },
                    different: {
                        field: 'phone1',
                        message: 'The alternate number must be different from Home number'
                    },
                    regexp: {
                        regexp: /^[0-9]{10}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            acceptTerms:{
                validators:{
                    notEmpty:{
                        message: 'The checkbox must be checked'
                    }
                }
            }
        }
    });

    $('#acceptTerms').on('ifChanged', function(event){
        $('#commentForm').bootstrapValidator('revalidateField', $('#acceptTerms'));
    });
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'onNext': function(tab, navigation, index) {
            var $validator = $('#commentForm').data('bootstrapValidator').validate();
            if($validator.isValid()){
                // alert('fd');
                $(".userprofile_tab1").addClass("tab_clr");
                $(".userprofile_tab2").addClass("tab_clr");
            }
            return $validator.isValid();
        },
        'onPrevious': function(tab, navigation, index) {
            $(".userprofile_tab2").removeClass("tab_clr");
        },
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            var $rootwizard= $('#rootwizard');
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $rootwizard.find('.pager .next').hide();
                $rootwizard.find('.pager .finish').show();
                $rootwizard.find('.pager .finish').removeClass('disabled');
            } else {
                $rootwizard.find('.pager .next').show();
                $rootwizard.find('.pager .finish').hide();
            }
            $('#rootwizard .finish').on("click",function() {
                var $validator = $('#commentForm').data('bootstrapValidator').validate();
                if ($validator.isValid()) {
                    $('#myModal').modal('show');
                    return $validator.isValid();
                    $rootwizard.find("a[href='#tab1']").tab('show');
                }
            });

        }});
    $('#rootwizard_no_val').bootstrapWizard({'tabClass': 'nav nav-pills'});

    $(".user2, .finish_tab, .next_btn1").on("click", function(){
        $(".userprofile_tab").addClass("tab_clr");
    });
    $(".user1, .previous_btn2").on("click", function(){
        $(".userprofile_tab").removeClass("tab_clr");
    });
    $(".finish_tab, .next_btn2").on("click", function(){
        $(".profile_tab").addClass("tab_clr");
    });
    $(".user2, .previous_btn3").on("click", function(){
        $(".profile_tab").removeClass("tab_clr");
    });
    $(".user1").on('click',function () {
        $(".user2 a span").removeClass("tab_clr");
    });
    $(".general_number").on('keyup',function () {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g,'')
        }
    });
});

