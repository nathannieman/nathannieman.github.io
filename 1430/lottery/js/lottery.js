var number = prompt("How many lottery numbers would you like? Max 10!");
var lottery = [];
var lotteryNumbers = "";

while (number > 10 || number < 1)
{
	alert("Must enter number smaller than 10 & not 0!")
	var number = prompt("How many lottery numbers would you like? Max 10!");
}
for (var i = 0; i < number; i++)
{
	lottery[i] = Math.ceil(Math.random() * 99);

}
for (var i = 0; i < lottery.length; i++)
{
	if (i == number - 1)
	{
		lotteryNumbers += lottery[i];
	}
	else
	{
		lotteryNumbers += lottery[i] + " - ";
	}
}
document.write(lotteryNumbers);
