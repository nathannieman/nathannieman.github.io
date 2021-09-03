var markers = ["X", "O"];
var players = [];
var whoseTurn = 0;
var totals = [];
var winCodes = [7,56,73,84,146,273,292,448]
var gameOver;



function gameStarted()
{
	players[0] = document.getElementById('playerOne').value;
	players[1] = document.getElementById('playerTwo').value; 
	var counter = 1;
	var innerDivs = "";
	
	document.getElementById('playGame').style.visibility = 'hidden';
	
	for (i = 1; i <= 3; i++)
	{
		innerDivs += '<div id="row' + i + '">';
		for (n = 1; n <= 3; n++)
		{
			innerDivs += '<div onclick="playGame(this,' + counter + ');"></div>';	
			counter *=2;
		}
		innerDivs += '</div>';
	}
	document.getElementById("game-board").innerHTML = innerDivs;
	totals = [0, 0];
	gameOver = false;
	document.getElementById("game-intro").innerText = "It's " + players[whoseTurn] + "'s Turn";
}

function playGame(clickedDiv, divValue)
{
	if (!gameOver)
	{
		//Places marker onto game board
		clickedDiv.innerText = markers[whoseTurn];
		
		//Track total count for possible win for each player
		totals[whoseTurn] += divValue;
		
		//call isWin() function
		if (isWin())
		{
			document.getElementById("game-intro").innerText = players[whoseTurn] + " has won!";
			document.getElementById('playGame').style.visibility = 'visible';
			var audioW = document.getElementById("audioWon");
			audioW.play();
		}
		
		else if (gameOver)
		{
			document.getElementById("game-intro").innerText = "Nobody has won!";
			document.getElementById('playGame').style.visibility = 'visible';
			var audioL = document.getElementById("audioLost");
			audioL.play();
		}
		
		else
		{
			//Toggle player turn
			if (whoseTurn) whoseTurn = 0; else whoseTurn = 1;
			
			//Prevent clicking on the same div twice
			clickedDiv.attributes["0"].nodeValue = "";
			
			//Tooggle message to display who's turn 
			document.getElementById("game-intro").innerText = "It's " + players[whoseTurn] + "'s Turn";
		}
	}
}

function isWin()
{
	for (i = 0; i < winCodes.length; i++)
	{
		if((totals[whoseTurn] & winCodes[i]) == winCodes[i])
		{
			gameOver = true;
			return true;
		}
	}
	
	if (totals[0] + totals[1] == 511) 
	{
		gameOver = true;
	}
	
	return false
}