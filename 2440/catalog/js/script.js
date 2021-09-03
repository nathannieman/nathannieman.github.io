let inputs = document.querySelectorAll('form#main-form > input[type="password"]');
for (input of inputs) {input.addEventListener('input',validate);}

document.getElementById('main-button').disabled = true;

let pas = document.getElementById('pw');
pas.addEventListener('keyup', validation);

function validate()
{
	let pass = document.getElementById('pw');
	let confirmPass = document.getElementById('cpw');
	let msg = document.getElementById('msg');
	let but = document.getElementById('main-button');
	let pex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	let pin = document.getElementById('pin');
	let pins = document.getElementById('pins');
	pin.innerText = "Your password is " + ((pex.test(pas.value)) ? "" : " not ") + " valid";
	pin.className = ((pex.test(pas.value)) ? "valid" : "invalid");
	
	
	if(pin.className == "invalid")
	{
		pins.innerText = "Password must be 8 characters long and contain a number";
		pins.className = "invalid";
	}
	
	if(pass.value == confirmPass.value && pin.className == "valid") 
	{
		but.disabled = false;
		pins.className = "valid";
		but.className = "submit";
	}
	
	if(pass.value == confirmPass.value) 
	{
		msg.innerText = "Passwords Match";
		msg.className = "valid";
	}
	else
	{
		msg.innerText = "Passwords Don't Match";
		msg.className = "invalid";
		but.className = "reset";
	}
}
