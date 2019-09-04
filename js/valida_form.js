// JavaScript Document
jQuery(function ($) {


	$.validator.addMethod('cpf', function (value, element, param) {
		$return = true;

		// this is mostly not needed
		var invalidos = [
			'111.111.111-11',
			'222.222.222-22',
			'333.333.333-33',
			'444.444.444-44',
			'555.555.555-55',
			'666.666.666-66',
			'777.777.777-77',
			'888.888.888-88',
			'999.999.999-99',
			'000.000.000-00'
		];
		for (i = 0; i < invalidos.length; i++) {
			if (invalidos[i] == value) {
				$return = false;
			}
		}

		value = value.replace("-", "");
		value = value.replace(/\./g, "");

		//validando primeiro digito
		add = 0;
		for (i = 0; i < 9; i++) {
			add += parseInt(value.charAt(i), 10) * (10 - i);
		}
		rev = 11 - (add % 11);
		if (rev == 10 || rev == 11) {
			rev = 0;
		}
		if (rev != parseInt(value.charAt(9), 10)) {
			$return = false;
		}

		//validando segundo digito
		add = 0;
		for (i = 0; i < 10; i++) {
			add += parseInt(value.charAt(i), 10) * (11 - i);
		}
		rev = 11 - (add % 11);
		if (rev == 10 || rev == 11) {
			rev = 0;
		}
		if (rev != parseInt(value.charAt(10), 10)) {
			$return = false;
		}

		return $return;
	});
	
	jQuery.validator.addMethod("cnpj", function (value, element) {

            var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
            if (value.length == 0) {
                return false;
            }

            value = value.replace(/\D+/g, '');
            digitos_iguais = 1;

            for (i = 0; i < value.length - 1; i++)
                if (value.charAt(i) != value.charAt(i + 1)) {
                    digitos_iguais = 0;
                    break;
                }
            if (digitos_iguais)
                return false;

            tamanho = value.length - 2;
            numeros = value.substring(0, tamanho);
            digitos = value.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0)) {
                return false;
            }
            tamanho = tamanho + 1;
            numeros = value.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            return (resultado == digitos.charAt(1));
        });-



	$.validator.setDefaults({
		submitHandler: function () {
			alert("Feito!");
		}
	});
	$("#edit_event").validate({
		rules: {
			hora: {
				time: true,
				required: true,
				remote: {
					url: "../lib/verificaEventoEdit.php",
					type: "post",
					data: {
						dsemana: function () {
							return $("#dsemana").val();
						},
						horaold: $("#horaold").val(),
						diaold: $("#diaold").val(),
						idfilial: $("#filial").val(),
						id: $("#id").val()
					}
				}

			}
		},
		messages: {
			hora: {
				remote: "Já existe um evento nesse horário.",
				required: "Preencha este campo."
			}
		},
		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}
	});
	$("#new_event").validate({
		rules: {
			hora: {
				time: true,
				required: true,
				remote: {
					url: "../lib/verificaEvento.php",
					type: "post",
					data: {
						dsemana: function () {
							return $('#dsemana').val();
						}
					}
				}

			}
		},
		messages: {
			hora: {
				remote: "Já existe um evento nesse horário.",
				required: "Preencha este campo."
			}
		},
		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}
	});



	$("#treinamento").validate({
		rules: {
			nome: {
				required: true,
				remote: {
					url: "../lib/verificaNomeTrei.php",
					type: "post",
				}
			}
		},
		messages: {
			nome: {
				remote: "Treinamento já existe.",
			}
		},
		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}
	});

	$("#aluno_editar").validate({
		rules: {
			nome: {
				required: true,
				minlength: 5
			},
			cpf: {
				required: true,
				cpf: true,
				remote: {
					url: "../verificaCpf.php",
					type: "post",
					data: {
						cpfo: $('#cpfOLD').val()
					}
				}

			},
			cidade: {
				required: true,
				minlength: 2
			},
			segunda: "time",
			terca: "time",
			quarta: "time",
			quinta: "time",
			sexta: "time",
			sabado: "time",
			email: {
				required: true,
				email: true,
				remote: {
					url: "../verificaEmail.php",
					type: "post",
					data: {
						cpf: $('#input_CPF').val()
					}
				}

			},
			telefone: {
				required: true,
				telefone: true
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			cep: {
				cep: true
			},
			senha: {
				minlength: 8
			},
			confsenha: {
				equalTo: '#senha'
			},
			pagamento: {
				required: true,
				max: 31,
				min: 1
			}
		},
		messages: {
			email: {
				remote: "E-mail já cadastrado."
			},
			cpf: {
				remote: "CPF já cadastrado."
			},
			pagamento: {
				max: "Por favor insira um dia válido.",
				min: "Por favor insira um dia válido."
			}
		},


		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}

	});

	$("#novo_parceiro").validate({
		rules: {
			

		},
		messages: {
			nomeExercicio: {
				remote: "Exercicio já cadastrado."
			},
			url: {
				remote: "Link já cadastrado."
			}
		},
		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}

	});
	
	$("#exercicio_cadastro").validate({
		rules: {
			nomeExercicio: {
				remote: {
					url: "../lib/verificaExercicio.php",
					type: "post",

				}
			},
			url: {
				remote: {
					url: "../verificaLink.php",
					type: "post"

				}
			}

		},
		messages: {
			nomeExercicio: {
				remote: "Exercicio já cadastrado."
			},
			url: {
				remote: "Link já cadastrado."
			}
		},
		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}

	});

	$("#aluno_cadastro").validate({
		rules: {
			nome: {
				required: true,
				minlength: 5
			},
			cpf: {
				required: true,
				cpf: true,
				remote: {
					url: "../verificaCpf.php",
					type: "post"
				}

			},
			cidade: {
				required: true,
				minlength: 2
			},
			segunda: "time",
			terca: "time",
			quarta: "time",
			quinta: "time",
			sexta: "time",
			sabado: "time",
			email: {
				required: true,
				email: true,
				remote: {
					url: "../verificaEmailc.php",
					type: "post"
				}

			},
			telefone: {
				required: true,
				telefone: true
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			cep: {
				cep: true

			},
			senha: {
				required: true,
				minlength: 8
			},
			confsenha: {
				required: true,
				equalTo: '#senha'
			},
			pagamento: {
				required: true,
				max: 31,
				min: 1
			}
		},
		messages: {
			email: {
				remote: "E-mail já cadastrado."
			},
			cpf: {
				remote: "CPF já cadastrado."
			},
			pagamento: {
				max: "Por favor insira um dia válido.",
				min: "Por favor insira um dia válido."
			}
		},


		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}

	});


	$("#colab_cadastro").validate({
		rules: {
			nome: {
				required: true,
				minlength: 5
			},
			cpf: {
				required: true,
				cpf: true,
				remote: {
					url: "../verificaCpf.php",
					type: "post",
				}

			},
			cidade: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: "../verificaEmailc.php",
					type: "post"
				}

			},
			telefone: {
				required: true,
				telefone: true
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			cep: {
				cep: true,
				required: true
			},
			senha: {
				required: true,
				minlength: 8
			},
			confsenha: {
				required: true,
				equalTo: '#senha'
			},
			pagamento: {
				required: true,
				max: 31,
				min: 1
			}
		},
		messages: {
			email: {
				remote: "E-mail já cadastrado."
			},
			cpf: {
				remote: "CPF já cadastrado."
			},
			pagamento: {
				max: "Por favor insira um dia válido.",
				min: "Por favor insira um dia válido."
			}
		},


		errorElement: 'span',




		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass('is-valid');

		},
		submitHandler: function (form) {
			form.submit();
		}

	});

	jQuery.extend(jQuery.validator.messages, {
		required: "Este campo é necessário.",
		telefone: "Por favor insira um telefone válido.",
		cpf: "Por favor insira um CPF válido.",
		cep: "Por favor insira um CEP válido.",
		time: "Por favor insira uma hora válida.",
		email: "Por favor insira um endereço de e-mail válido.",
		url: "Please enter a valid URL.",
		date: "Please enter a valid date.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Please enter a valid number.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Senhas divergentes.",
		accept: "Por favor escolha um arquivo com uma extensão válida.",
		maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
		minlength: jQuery.validator.format("Por favor digite pelo menos {0} caracteres."),
		rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
	});


});
