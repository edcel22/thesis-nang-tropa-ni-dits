

/*Javascript for Yield Calculator*/

	/*Hide the second button for 2 bedroom type*/
	$('#YieldCalculateSubmitSecond').hide()
	/*enable the fields when clicked the bedroom radio buttons*/
	$('.bedroom_type').click(function() {
		$('.calculator_fields').addClass('open')
		$('#DailyRent,#unit_price,#occupancy').removeAttr('disabled')
		$('.submit-button .btn-submit').removeAttr('disabled')

	})

	$('#one_bedroom').click(function(){
		emptyResult()
		oneBedroom()
		$('#YieldCalculateSubmitSecond').hide()
		$('#YieldCalculateSubmitOne').show()
	});

	$("#two_bedroom").click(function() {
		emptyResult()
		twoBedroom()
		$('#YieldCalculateSubmitSecond').show()
		$('#YieldCalculateSubmitOne').hide()
	});


/*One Bedroom calculation*/
$('#YieldCalculateSubmitOne').click(function() {
	var dailyRent  = $('#DailyRent').val(),
		operatingCost = $('#operating_cost').val(),
		occupancy = $('#occupancy').val(),
		furnishingCost = $('#furnishing_cost').val(),
		unitPrice = $('#unit_price').val(),
		furnishingCostResult = furnishingCost.replace(',', ''),
		operatingCostResult = operatingCost.replace(',', '')
		/*console.log('min:'+min+'max:'+max)*/
		console.log('sdsddds')
		if (dailyRent < 3900 || dailyRent > 15000) {
			$('.rent_input_container').addClass('error')
			if (dailyRent < 3900) {
				$('.tooltip-error').text('Please enter amount equal or greater than 3900')
			} else {
				$('.tooltip-error').text('Please enter amount equal or less than 15000')
			}

		} else {
			/*remove the error message*/
			$('.rent_input_container').removeClass('error')

			/*Loader for submit*/
		    var btndom = $(this)
	        btndom.addClass("loading-start")
	        btndom.attr("disabled",true)
	        
	        setTimeout(function() {
	          btndom.removeClass("loading-start").removeAttr("disabled")
	        },500);
	        
			/*Calculation for yearly net income*/
			var netIncome = dailyRent * (365 * occupancy) - operatingCostResult

			/*calculation for total investment*/
			var totalInvestment = parseFloat(unitPrice) + parseFloat(furnishingCostResult)
			
			/*Rental yield calculation*/
			var rentalYield = netIncome / totalInvestment
			
			/*Convert to percentage*/
			var yieldvalue = Math.round((rentalYield) * 100)+'%'
			
			/*Round of to 2 decimal places */
			netIncome.toFixed(2)

			/*pass value to input fields*/
			/*$('#netIncome').text(netIncome.toFixed(2))*/
			setTimeout(function() {
				$('#netIncome').text(netIncome.toLocaleString())
				$('#rentalYield').text(yieldvalue)
				$('#totalInvestment').text(totalInvestment.toLocaleString())
			},501)
		}
}) 

/*Two Bedroom calculation*/
$('#YieldCalculateSubmitSecond').click(function() {
	var dailyRent  = $('#DailyRent').val(),
		operatingCost = $('#operating_cost').val(),
		occupancy = $('#occupancy').val(),
		furnishingCost = $('#furnishing_cost').val(),
		unitPrice = $('#unit_price').val(),
		furnishingCostResult = furnishingCost.replace(',', ''),
		operatingCostResult = operatingCost.replace(',', '')
		/*console.log('min:'+min+'max:'+max)*/

		if (dailyRent < 7000 || dailyRent > 10000) {
			$('.rent_input_container').addClass('error')
			if (dailyRent < 7000) {
				$('.tooltip-error').text('Please enter amount equal or greater than 7000')
			} else {
				$('.tooltip-error').text('Please enter amount equal or less than 10000')
			}

		} else {
			/*remove the error message*/
			$('.rent_input_container').removeClass('error')

			/*Loader for submit*/
		    var btndom = $(this)
	        btndom.addClass("loading-start")
	        btndom.attr("disabled",true)
	        
	        setTimeout(function() {
	          btndom.removeClass("loading-start").removeAttr("disabled")
	        },500);
	        
			/*Calculation for yearly net income*/
			var netIncome = dailyRent * (365 * occupancy) - operatingCostResult

			/*calculation for total investment*/
			var totalInvestment = parseFloat(unitPrice) + parseFloat(furnishingCostResult)
			
			/*Rental yield calculation*/
			var rentalYield = netIncome / totalInvestment
			
			/*Convert to percentage*/
			var yieldvalue = Math.round((rentalYield) * 100)+'%'
			
			/*Round of to 2 decimal places */
			netIncome.toFixed(2)

			/*pass value to input fields*/
			/*$('#netIncome').text(netIncome.toFixed(2))*/

			setTimeout(function() {
				$('#netIncome').text(netIncome.toLocaleString())
				$('#rentalYield').text(yieldvalue)
				$('#totalInvestment').text(totalInvestment.toLocaleString())
			},501)

		}
}) 







function oneBedroom() {
	/*change the value for one bedroom of inputs*/
	$('#operating_cost').attr('value', '182,850.48').text('Php 182,850.48')
	$('#furnishing_cost').attr('value', '400,000.00').text('Php 400,000.00')
 	$('#DailyRent').attr('min', '3900')
 	$('#DailyRent').attr('max', '15000')
 	$('.mdiin_max .min').text('Min - Php 3,900.00')
 	$('.mdiin_max .max').text('Max - Php 15,000.00')

	var optionValue = {
		"Php 7,238,000.00": "7238000",
		"Php 7,508,000.00": "7508000"
	}
	changeOptionValue(optionValue)
}




function twoBedroom() {
	/*change the value for two bedroom of inputs*/
	$('#operating_cost').attr('value', '197367.98').text('Php 197,367.98')
	$('#furnishing_cost').attr('value', '450,000.00').text('Php 450,000.00')
	$('#DailyRent').attr('min', '7000')
 	$('#DailyRent').attr('max', '10000')
 	$('.mdiin_max .min').text('Min - Php 7,000.00')
 	$('.mdiin_max .max').text('Max - Php 10,000.00')

	/*initialize options new values as object*/
	var optionValue = {
		"Php 7,800,000.00": "7800000",
		"Php 8,684,000.00": "8684000"
	}
	changeOptionValue(optionValue)
}





function changeOptionValue(optionValue) {

	var $unitPriceSelect = $("#unit_price");
	$unitPriceSelect.empty(); // remove old options
	/*change the select option values*/
	$.each(optionValue, function(key, value) {
	  $unitPriceSelect.append($("<option></option>")
	     .attr("value", value).text(key));
	});

}	



function  emptyResult() {
	$('#netIncome').text('')
	$('#rentalYield').text('')
	$('#totalInvestment').text('')
	$('#DailyRent').val('')
	$('#rentalYield').text('%')
	$('.rent_input_container').removeClass('error')
}