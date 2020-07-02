let $rankingsTableTBody = $("#rankingsTable tbody")







$.ajax({
	method: "POST",
	url: "curl.php",
	dataType: "json"
}).done(function( response ) {

	console.log(response)

	for(let i = 0; i < response.length; i++) {

		let team = response[i]

		let rowHTML = "<tr>"
		rowHTML += "<td>" + team.Key + "</td>"
		rowHTML += "<td>" + team.Wins + "-" + team.Losses + "</td>"
		rowHTML += "<td>" + (team.Percentage*100).toFixed(2) + "%" + "</td>"
		rowHTML += "<td>" + (team.PointsPerGameFor).toFixed(1) + "</td>"
		rowHTML += "</tr>"

		$rankingsTableTBody.append(rowHTML)
	}
});











// OLD CODE


// 	let base_url = "https://api.sportsdata.io/v3/nba/scores/json/Standings/2020?key=f7ef4fe182c047afb1d1458538da21f4";
 	
// 	function ajax(endpoint, returnFunction) {
// 		let xhr = new XMLHttpRequest();
// 	//.open ( method, Endpoint, Async?)

// 	xhr.open("GET", endpoint, true);
// 	// xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
// 	// xhr.setRequestHeader("Content-Type", "application/json");
// 	xhr.send();

// 	//we wait for some kind of response 
// 	xhr.onreadystatechange = function() {
// 		// console.log(this);
// 		if(this.readyState == this.DONE) {
// 			////Received some kind of response
// 			//if we got a success response abck
// 			if(xhr.status = 200) {
// 				 console.log(xhr.responseText);
// 				// console.log( JSON.parse( xhr.responseText) );

// 				let rankingResults = JSON.parse( xhr.responseText);
// 				//Next thing to do is display the results in the broswer
// 				returnFunction(rankingResults);
// 			}
// 			else {
// 				//error
// 				console.log("AJAX Error");
// 				console.log(xhr.status);

// 			}
// 		}
// 	}
// }



// function displayResults(results) {
		
// 		console.log("display results works");

// 		//display results
// 		console.log(results)

// 		let tbodyElement = document.querySelector("tbody");


// 			// create new tr and fill in td
// 		for(let i = 0; i < 30; i++) {
// 			// Create a <tr>
// 			let rowElement = document.createElement("tr");


// 			let cellRank = document.createElement("td");
// 			let cellTeam = document.createElement("td");
// 			// let logo = document.createElement("td");
// 			let cellRecord = document.createElement("td");
// 			let cellWin = document.createElement("td");



			// let results = results[i];

			// cellRank.innerHTML = i + 1;
			// cellTeam.innerHTML = results.key;
			// cellRecord.innerHTML = results.wins + "-" + results.losses;
			// cellWin.innerHTML = results.percentage * 100 + "%";

			// rowElement.appendChild(cellRank);
			// rowElement.appendChild(cellTeam);
			// rowElement.appendChild(cellRecord);
			// rowElement.appendChild(cellWin);

			// document.querySelector("tbody").appendChild(rowElement);
	// 		}



	// }


	

// ajax(base_url, displayResults);
