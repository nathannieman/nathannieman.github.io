var username = prompt("Enter your name:");
var age = prompt("Enter your age:");
var month = prompt("Enter your birth month:");

if (age < 50)
{
	alert("Happy Birthday " + username + "! You are " + age + " Years old. You're still young! You were born in " + month);
}

else if (age >= 50)
{
	alert("Happy Birthday " + username + "! You are " + age + " Years old. Dang! You're Old! You were born in " + month);
}

else
{
	alert("You did not enter a number for your age!");
}