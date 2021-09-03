var game = prompt("Play story 1 or story 2:");

if (game == 1)
{
	var adjective1 = prompt("Enter an adjective (describe the weather):");
	var noun1 = prompt("Enter a noun (person):");
	var noun2 = prompt("Enter a second noun (object):");
	var verb1 = prompt("Enter a verb (action):");
	var verb2 = prompt("Enter a second verb (action):");
	var adjective2 = prompt("Enter a second adjective (how you feel):");
	
	var story1 = "<p>It was a " + adjective1 + " winter day. " + noun1 + " was going to Salt Lake Community College. As always in their backpack was a valuable " + noun2 + ". " + noun1 + " was late for class and had to " + verb1 + " to get to class. While doing so didn't see the patch of black ice on the street and " + verb2 + " to the ground breaking their valuable " + noun2 + ". This made them late to class and feel " + adjective2 + " the whole day.</p>";
	document.write(story1);
}

else if (game == 2)
{
	var noun3 = prompt("Enter a noun (food):");
	var adjective3 = prompt("Enter an adjective (describe the food):");
	var verb3 = prompt("Enter a verb (action):");
	var noun4 = prompt("Enter a second noun (side-dish):");
	var verb4 = prompt("Enter a second verb (action):");
	var adjective4 = prompt("Enter a second adjective (how you feel):");
	
	var story2 = "<p>My favorite food in the whole world is " + noun3 + ". There is nothing I would rather eat it tastes so " + adjective3 + ". The worst is taking a bite and it " + verb3 + " all over the place. The best side to go with it is " + noun4 + ". Just make sure you don't do too much " + verb4 + " after eating or you will feel " + adjective4 + " for the rest of the day.</p>";
	document.write(story2);
}

else
{
	alert("You did not enter 1 or 2");
}