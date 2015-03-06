<!DOCTYPE html>

<html>
	<head>
		<style type="text/css">
			.error, #error { color: red; }
		</style>
		
		<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#submit').click(function(){
					return validForm();   
				});
				$('#error').hide();
			});
 
			function validForm(){
				var nameReg = /^[A-Za-z]+$/;
				var ccReg = /^[0-9]{16}$/;
				var dateReg = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
				var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
				var urlReg = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;

				var fname = $('#fname').val();
				var lname = $('#lname').val();
				var company = $('#company').val();
				var phone = $('#phone').val();
				var email = $('#email').val();
				var url = $('#url').val();
				var address = $('#address').val();
				var birthday = $('#birthday').val();
				var addDate = $('#add_date').val();
				var note = $('note').val();
				
				var err = false;
				$('.error').hide();
				$('#error').hide();

				if(fname == ""){
					$('#error').after('<div class="error"> Please enter the first name</div>');
					$('#fname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!nameReg.test(fname)){
					$('#error').after('<div class="error">Letters only</div>');
					$('#fname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}

				if(lname == ""){
					$('#error').after('<div class="error"> Please enter the last name</div>');
					$('#lname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!nameReg.test(lname)){
					$('#error').after('<div class="error"> Letters only</div>');
					$('#lname').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}

				if(email == ""){
					$('#error').after('<div class="error"> Please enter the email</div>');
					$('#email').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!emailReg.test(email)){
					$('#error').after('<div class="error"> You need a valid email address like: abc123@gmail.com</div>');
					$('#email').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if( (url != "") && (!urlReg.test(url)) ){
					$('#error').after('<div class="error"> You need a valid url</div>');
					$('#url').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if(phone == ""){
					$('#error').after('<div class="error"> Please enter phone number</div>');
					$('#phone').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if( (birthday != "") && (!dateReg.test(birthday)) ){
					$('#error').after('<div class="error"> You need a valid birthday, YYYY-MM-DD only </div>');
					$('#birthday').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				if(addDate == ""){
					$('#error').after('<div class="error"> Please enter add contact date</div>');
					$('#add_date').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				else if(!dateReg.test(addDate)){
					$('#error').after('<div class="error">You need a valid add contact date,YYYY-MM-DD only</div>');
					$('#add_date').after('<span class="error">*</span>');
					$('#error').show();
					err = true;
				}
				
				return !err;
			}
		</script>
	</head>
	<body>
		<h2>Add Contact</h2>
		<div id="error">
			Please check for errors!
		</div>
		<form action="AddContact.php" method="post">
			First Name: <input type="text" name="fname" id="fname" /><br/>
			Last Name: <input type="text"  name="lname" id="lname" /><br/>
			Company: <input type="text" name="company" id="company" /><br/>
			Phone: <input type="int" name="phone" id="phone" /><br/>
			Email: <input type="text" name="email" id="email" /><br/>
			URL: <input type="text" name="url" id="url" /><br/>
			Address: <input type="text" name="address" id="address" /><br/>
			Birthday: <input type="date" name="birthday" id="birthday" /><br/>
			Date: <input type="date" name="add_date" id="add_date" /><br/>
			Notes: <input type="text" name="note" id="note" /><br/>
			<input type="submit" id="submit" />
		</form>
		<a href='AdminPage.php'>
			Go Back</br>
		</a>
	</body>
</html>