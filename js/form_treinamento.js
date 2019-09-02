jQuery(function ($) {
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
	
});