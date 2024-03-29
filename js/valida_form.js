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
	}); -



	$.validator.setDefaults({
		submitHandler: function () {
			alert("Feito!");
		}
	});
	$("#avalfisica").validate({
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
	
	$("#agendamento_exp").validate({
		rules: {
			nome: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: "../lib/verificaAgExp.php",
					type: "post",
					data: {
						dia: function () {
							return $("#picker").val();
						},
						hora: function () {
							return $("#horario").val();
						},
						filial: function () {
							return $("#filial").val();
						}
					}
				}

			},
			numero: {
				required: true,
				minlength: 13
			}
		},
		messages: {
			email: {
				remote: "E-mail já cadastrado no horário selecionado."
			},
			cpf: {
				remote: "CPF já cadastrado."
			},
			pagamento: {
				max: "Por favor, insira um dia válido.",
				min: "Por favor, insira um dia válido."
			},
			numero: {
				minlength: "Por favor, digite um telefone válido."
			},
			cep: {
				minlength: "Por favor, digite um CEP válido."
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
	$("#depoimento").validate({
		rules: {
			descr: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
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
	
	$("#login").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			senha: {
				required: true
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
				max: "Por favor, insira um dia válido.",
				min: "Por favor, insira um dia válido."
			},
			telefone: {
				minlength: "Por favor, digite um telefone válido."
			},
			cep: {
				minlength: "Por favor, digite um CEP válido."
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
	$("#edit_event").validate({
		rules: {
			hora: {
				time: true,
				required: true,
				minlength: 5,
				remote: {
					url: "../lib/verificaEventoEdit.php",
					type: "post",
					data: {
						dsemana: function () {
							return $("#dsemana").val();
						},
						horafim: function(){
							return $("#horafim").val();
						},
						horaold: $("#horaold").val(),
						diaold: $("#diaold").val(),
						idfilial: $("#filial").val(),
						id: $("#id").val(),
						horafimold: $("#horafimold").val()
					}
				}

			},
			horafim: {
				time: true,
				required: true,
				minlength: 5,
				remote: {
					url: "../lib/verificaEventoEdit.php",
					type: "post",
					data: {
						dsemana: function () {
							return $("#dsemana").val();
						},
						hora: function(){
							return $("#hora").val();
						},
						horaold: $("#horaold").val(),
						diaold: $("#diaold").val(),
						idfilial: $("#filial").val(),
						id: $("#id").val(),
						horafimold: $("#horafimold").val()
					}
				},			
				min: function(){ 
					return $("#hora").val()},

			}
		},
		messages: {
			hora: {
				remote: "Já existe um evento nesse horário.",
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			horafim: {
				remote: "Já existe um evento nesse horário.",
				minlength: "Por favor, insira um horário válido no formato hh:mm."
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
				minlength: 5,
				remote: {
					url: "../lib/verificaEvento.php",
					type: "post",
					data: {
						dsemana: function () {
							return $('#dsemana').val();
						},
						horafim: function() {
							return $('#horafim').val();
						}
					}
				}

			},
			horafim: {
				time: true,
				required: true,
				minlength: 5,
				min: function(){ 
					return $("#hora").val()},
				remote: {
					url: "../lib/verificaEvento.php",
					type: "post",
					data: {
						dsemana: function () {
							return $('#dsemana').val();
						},
						hora: function() {
							return $('#hora').val();
						}
					}
				}

			}
		},
		messages: {
			hora: {
				remote: "Já existe um evento nesse intervalo de horário.",
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			horafim: {
				remote: "Já existe um evento nesse intervalo de horário.",
				minlength: "Por favor, insira um horário válido no formato hh:mm."
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
	$("#redef_senha").validate({
		rules: {
			email: {
				email: true,
				required: true,
				remote: {
					url: "../lib/verificaSenha.php",
					type: "post"
				}

			},
			senha: {
				minlength: 8,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			confsenha: {
				minlength: 8, 
				equalTo: '#senha',
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			}
		},
		messages: {
			email: {
				remote: "E-mail inválido."
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
				},
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			}
		},
		messages: {
			nome: {
				remote: "Treinamento já cadastrado.",
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

	$("#edit_treinamento").validate({
		rules: {
			nome: {
				required: true,
				remote: {
					url: "../lib/verificaTrei.php",
					type: "post",
					data: {
						nomeOld: function () {
							return $('#nomeOld').val();
						}
					}
				},
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			}
		},
		messages: {
			nome: {
				remote: "Treinamento já cadastrado.",
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
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
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
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			estado: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			rua: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			segunda: {
				time: true,
				minlength: 5
			},
			terca: {
				time: true,
				minlength: 5
			},
			quarta: {
				time: true,
				minlength: 5
			},
			quinta: {
				time: true,
				minlength: 5
			},
			sexta: {
				time: true,
				minlength: 5
			},
			sabado: {
				time: true,
				minlength: 5
			},
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
			bairro: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			numero: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			telefone: {
				required: true,
				minlength: 13
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			cep: {
				minlength: 9
			},
			senha: {
				minlength: 8,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			confsenha: {
				equalTo: '#senha',
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
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
				max: "Por favor, insira um dia válido.",
				min: "Por favor, insira um dia válido."
			},
			telefone: {
				minlength: "Por favor, digite um telefone válido."
			},
			cep: {

				minlength: "Por favor, digite um CEP válido."
			},
			segunda: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			terca: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			quarta: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			quinta: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			sexta: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			sabado: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
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
			nome: {
				required: true,
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			cnpj: {
				cnpj: true,
				remote: {
					url: "../lib/verificaCnpj.php",
					type: "post"
				}
			},
			bairro: {
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			cidade: {
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			email: {
				email: true,
				required: true,
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			estado: {
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			rua: {

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			numero: {

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			telefone: {
				minlength: 13
			},
			cep: {
				minlength: 9
			}
		},
		messages: {
			telefone: {
				minlength: "Por favor, digite um telefone válido."
			},
			cep: {
				minlength: "Por favor, digite um cep válido."
			},
			cnpj: {
				cnpj: "CNPJ inválido.",
				remote: "CNPJ já cadastrado."
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

	$("#editar_parceiro").validate({
		rules: {
			nome: {
				required: true,
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			cnpj: {
				cnpj: true,
				remote: {
					url: "../lib/verificaCnpjEdit.php",
					type: "post",
					data: {
						cnpjOld: function () {
							return $('#cnpjOld').val();
						}
					}
				}
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			bairro: {
	
				normalizer: function (value) {
					return $.trim(value);
				}
			},
			cidade: {

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			email: {
				email: true,
				required: true,

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			estado: {

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			rua: {

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			numero: {

				normalizer: function (value) {
					return $.trim(value);
				}
			},
			telefone: {
				minlength: 13
			},
			cep: {
				minlength: 9
			}
		},
		messages: {
			telefone: {
				minlength: "Por favor, digite um telefone válido."
			},
			cep: {
				minlength: "Por favor, digite um cep válido."
			},
			nomeExercicio: {
				remote: "Exercicio já cadastrado."
			},
			url: {
				remote: "Link já cadastrado."
			},
			cnpj: {
				cnpj: "CNPJ inválido.",
				remote: "CNPJ já cadastrado."
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
					type: "post"

				},
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			hora: {
				required: true,
				remote: {
					url: "../lib/verificaAgFis.php",
					type: "post",
					data: {
						dia: function () {
							return $("#datepicker").val();
						},
						cpf: function(){
							return $("#input_cpf").val();
						}
					}
				}

			},
			cancelamento: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
				
			},
			descricao: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			url: {
				remote: {
					url: "../verificaLink.php",
					type: "post"

				},
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			}

		},
		messages: {
			hora:{
				remote: "Agendamento já cadastrado."
			},
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

	$("#editar_exercicio").validate({
		rules: {
			nomeExerciciou: {
				remote: {
					url: "../lib/verificaExercicioEdit.php",
					type: "post",
					data: {
						nomeOld: $('#nomeOld').val()
					}

				},
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			descricao: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			url: {
				remote: {
					url: "../verificaLinkEdit.php",
					type: "post",
					data: {
						linkOld: $('#linkOld').val()
					}
				}
			}

		},
		messages: {
			nomeExerciciou: {
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

	$("#new_ticket").validate({
		rules: {
			nome_ticket: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			desc: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			}
		},
		messages: {
		
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

	$("#novo_manual").validate({
		rules: {
			manual: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			}
		},
		messages: {
		
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
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			cpf: {
				required: true,
				cpf: true,
				remote: {
					url: "../verificaCpf.php",
					type: "post"
				}

			},
			estado: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			cidade: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			rua: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			bairro: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			segunda: {
				time: true,
				minlength: 5
			},
			terca: {
				time: true,
				minlength: 5
			},
			quarta: {
				time: true,
				minlength: 5
			},
			quinta: {
				time: true,
				minlength: 5
			},
			sexta: {
				time: true,
				minlength: 5
			},
			sabado: {
				time: true,
				minlength: 5
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
				minlength: 13
			},
			numero: {
				required: true,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			cep: {
				minlength: 9

			},
			senha: {
				required: true,
				minlength: 8,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			confsenha: {
				required: true,
				equalTo: '#senha',
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
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
				max: "Por favor, insira um dia válido.",
				min: "Por favor, insira um dia válido."
			},
			telefone: {
				minlength: "Por favor, digite um telefone válido."
			},
			cep: {

				minlength: "Por favor, digite um CEP válido."
			},
			segunda: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			terca: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			quarta: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			quinta: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			sexta: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
			},
			sabado: {
				minlength: "Por favor, insira um horário válido no formato hh:mm."
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
				normalizer: function (value) {
					// Trim the value of every element
					return $.trim(value);
				}
			},
			cpf: {
				required: true,
				cpf: true,
				remote: {
					url: "../verificaCpf.php",
					type: "post",
				}

			},
			cnpj: {
				required: true,
				cnpj: true,
				remote: {
					url: "../lib/verificaCnpjfi.php",
					type: "post"
				}
			},
			cnpje: {
				required: true,
				cnpj: true,
				remote: {
					url: "../lib/verificaCnpjfie.php",
					type: "post",
					data: {
						cnpjold: $("#cnpjold").val()
					}
				}
			},
			estado: {
				required: true,
				normalizer: function (value) {
					// Trim the value of every element
					return $.trim(value);
				}
			},
			cidade: {
				required: true,
				normalizer: function (value) {
					// Trim the value of every element
					return $.trim(value);
				}
			},
			rua: {
				required: true,
				normalizer: function (value) {
					// Trim the value of every element
					return $.trim(value);
				}
			},
			bairro: {
				required: true,
				normalizer: function (value) {
					// Trim the value of every element
					return $.trim(value);
				}
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: "../verificaEmailc.php",
					type: "post"
				}

			},
			numero: {
				required: true,
				normalizer: function (value) {
					// Trim the value of every element
					return $.trim(value);
				}
			},
			telefone: {
				required: true,
				minlength: 13
			},
			foto: {
				accept: "image/jpeg, image/png, image/jpg"
			},
			cep: {
				required: true,
				minlength: 9
			},
			senha: {
				required: true,
				minlength: 8,
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			confsenha: {
				required: true,
				equalTo: '#senha',
				normalizer: function (value) {
					// Trim the value of the input
					return $.trim(value);
				}
			},
			pagamento: {
				required: true,
				max: 31,
				min: 1
			}
		},
		messages: {
			cnpj:{
				cnpj: "CNPJ inválido.",
				remote: "CNPJ já cadastrado."
			},
			cnpje:{
				cnpj: "CNPJ inválido.",
				remote: "CNPJ já cadastrado."
			},
			email: {
				remote: "E-mail já cadastrado."
			},
			cep: {
				minlength: "Por favor, digite um CEP válido."
			},
			telefone: {
				minlength: "Por favor, digite um telefone válido."
			},
			cpf: {
				remote: "CPF já cadastrado."
			},
			pagamento: {
				max: "Por favor, insira um dia válido.",
				min: "Por favor, insira um dia válido."
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
		cnpj: "CNPJ inválido.",
		telefone: "Por favor, insira um telefone válido.",
		cpf: "Por favor, insira um CPF válido.",
		cep: "Por favor, insira um CEP válido.",
		time: "Por favor, insira uma hora válida.",
		email: "Por favor, insira um endereço de e-mail válido.",
		url: "Por favor, insira uma url válida.",
		date: "Please enter a valid date.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Please enter a valid number.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Senhas divergentes.",
		accept: "Por favor, selecione um arquivo com um formato válido.",
		maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
		minlength: jQuery.validator.format("Por favor, digite pelo menos {0} caracteres."),
		rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		min: jQuery.validator.format("O horário de término deve ser posterior ao horário de início.")
	});


});
