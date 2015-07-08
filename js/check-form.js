$(document).ready(function() {
		$('#form_reg').validate(
				{
					// ������� ��� ��������
					rules:{
						"reg_login":{
							required:true,
							minlength:4,
							maxlength:15,
							remote:{
							type: "post",
							url: "/reg/check_login.php"
									}
						},
						"reg_pass":{
							required:true,
							minlength:5,
							maxlength:15
						},
						"reg_surname":{
							required:true,
							minlength:3,
							maxlength:15
						},
						"reg_name":{
							required:true,
							minlength:3,
							maxlength:15
						},
						"reg_email":{
							required:true,
							email:true
						},
						"reg_phone":{
							required:true
						},
						"reg_address":{
							required:true
						},
						"reg_captcha":{
							required:true,
							remote: {
							type: "post",
							url: "/reg/check_captcha.php"
									}
						}
					},
					// ��������� ��������� ��� ��������� ��������������� ������
					messages:{
						"reg_login":{
							required:"������� �����!",
							minlength:"�� 4 �� 15 ��������!",
							maxlength:"�� 4 �� 15 ��������!",
							remote: "����� �����!"
						},
						"reg_pass":{
							required:"������� ������!",
							minlength:"�� 5 �� 15 ��������!",
							maxlength:"�� 5 �� 15 ��������!"
						},
						"reg_surname":{
							required:"������� ���� �������!",
							minlength:"�� 3 �� 20 ��������!",
							maxlength:"�� 3 �� 20 ��������!"
						},
						"reg_name":{
							required:"������� ���� ���!",
							minlength:"�� 3 �� 15 ��������!",
							maxlength:"�� 3 �� 15 ��������!"
						},
						"reg_email":{
							required:"������� ���� E-mail",
							email:"�� ���������� E-mail"
						},
						"reg_phone":{
							required:"������� ����� ��������!"
						},
						"reg_address":{
							required:"���������� ������� ����� ��������!"
						},
						"reg_captcha":{
							required:"������� ��� � ��������!",
							remote:"�� ������ ��� ��������!"
						}
					},
	submitHandler: function(form) {
	$(form).ajaxSubmit({
	success: function(data) {
		if (data == 'true')
	{
		$("#block-form-registration").fadeOut(300,function() {
		$("#reg_message").addClass("reg_message_good").fadeIn(400).html("�� ������� ����������������!");
		$("#form_submit").hide();
		});
	}
	else
	{
		$("#reg_message").addClass("reg_message_error").fadeIn(400).html(data); 
	}
		}
			});
			}
			});
		});