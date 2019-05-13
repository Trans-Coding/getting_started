// This calculator provides an example of using the abstract factory method for generating
// an extremely fast mortgage calculator with multiple inputs and outputs in an easy to use format.
// A test bench is provided at the bottom for an example of both use and implementation and
// includes time implementation for calculating speed of use.
// Any outside code has been documented as such as well as its source.

// Generating a generic Abstract Factory Method
// see https://github.com/robdodson/JavaScript-Design-Patterns/blob/master/factory/abstract-factory/main.js
// Elminates the need for most calls with "new" modifier, as well as passing variables as this.*
// See notes:
//			@requirements: required input values for functionality
//			@to-add: for info on where things may be missing at this time
//			@return for return values as a type from functions
//			//---DATABASE--- as items to move to database at a later time


// // LoanCalculator extension template: (use cmd + / to remove comment markers)
// // create nameOfCalculator from extended calculator
// // @requirements: 
// //				input_variable.thing >= that
// // @to-add: better functionality in the future
// LoanCalculator.nameOfCalculator = function(input_variable){
// 	//set variables for use by all functions
// 	var this_variable = input_variable.thing;

// 	//generate universal calculations based on any variables for use by all functions

// 	return fromPrototype(LoanCalculator, {
// 		//function call declaration
// 		// this function does a thing
// 		// @requirements: 
// 		//				input_variable.thing >= that
// 		// @to-add: better functionality in the future
// 		// @optional: things that may or may not be used
// 		// @return the_thing as a thing
// 		functionName: function(){
// 			var the_thing;
// 			//---DATABASE--- this item should be called from a databse in the future
// 			return the_thing;
// 		},
// 		//next function
// 		nextFunctionName: function(){}
// 	});
// };


// Polyfill for old browsers pre ES5
// see http://kangax.github.com/es5-compat-table/
if(!Object.create) {
	Object.create = function(object) {
		if (arguments.length > 1){
			throw new Error ('Object.create implementation only accepts the first parameter of the argument.');
		}
		function Function(){}
		Function.prototype = object;
		return new Function();
	}
}

// from Prototype function
// see http://yehudakatz.com/2011/08/12/understanding-prototypes-in-javascript/
var fromPrototype = function(prototype, object) {
	var newObject = Object.create(prototype);
	for (var prop in object) {
		if (object.hasOwnProperty(prop)) { newObject[prop] = object[prop]; }
	}
	return newObject;
};

// global constants
var CentsPerDollar 				= 100;
var MonthsPerYear 				= 12;
var DefaultTermInYears 			= 30;
var DefaultDownPayment 			= 20000;
var DefaultInterestRate 		= 4.125;
var MinDTIPercent 				= 10;
var DefaultDTIPercent 			= 26;
var MaxDTIPercent 				= 50;
var NationalPropertyTaxAvg 		= 1.15;
var NationalInsuranceRateAvg 	= 0.8;
var LoantoValueRatio 			= 0.8;
var NationalPMIAvg				= 0.05;
var DefaultPropertyTaxState = "CA";

//property taxes by state
var annual_property_tax_table_2018 = {
	"AL"			: "0.43",
	"AK"			: "1.19",
	"AR"			: "0.77",
	"AZ"			: "0.63",
	"CA"			: "0.79",
	"CO"			: "0.57",
	"CT"			: "2.02",
	"DE"			: "0.55",
	"FL"			: "1.02",
	"GA"			: "0.93",
	"HI"			: "0.27",
	"ID"			: "0.76",
	"IL"			: "2.32",
	"IN"			: "0.87",
	"IA"			: "1.50",
	"KS"			: "1.40",
	"KY"			: "0.85",
	"LA"			: "0.51",
	"ME"			: "1.32",
	"MD"			: "1.10",
	"MA"			: "1.21",
	"MI"			: "1.71",
	"MN"			: "1.17",
	"MS"			: "0.80",
	"MO"			: "1.00",
	"MT"			: "0.85",
	"NE"			: "1.83",
	"NV"			: "0.77",
	"NH"			: "2.19",
	"NJ"			: "2.40",
	"NM"			: "0.76",
	"NY"			: "1.65",
	"NC"			: "0.86",
	"ND"			: "1.05",
	"OH"			: "1.56",
	"OK"			: "0.89",
	"OR"			: "1.07",
	"PA"			: "1.55",
	"SC"			: "0.57",
	"SD"			: "1.32",
	"TN"			: "0.75",
	"TX"			: "1.86",
	"UT"			: "0.67",
	"VT"			: "1.78",
	"VA"			: "0.79",
	"WA"			: "1.06",
	"WV"			: "0.59",
	"WI"			: "1.95",
	"WY"			: "0.61"
};


// define generic Calculator base object
// months go from 0 to 11 in javascript, make sure to account for this by subtracting 1 from any user entered data
var LoanCalculator = {
	dateCreation: function(startDate){
		if(!startDate){ startDate = new Date(); }
		var day = startDate.getDate();
		//if this is a new calculation, add 1 month to todays date
		checker = new Date();
		if( (startDate.getFullYear() == checker.getFullYear()) && (startDate.getMonth() == checker.getMonth()) ){
			startDate.setMonth(startDate.getMonth() + 2);
		}
		var month = startDate.getMonth();
		var year = startDate.getFullYear();
		return {'day': day, 'month': month, 'year': year};
	}
};

// create MortgageCalculator from extended calculator
// @requirements: 
//				loan_amount > 0
//				interest_rate >= 0
//				term_in_years > 0
// @to-add: VariableLTVRatio
LoanCalculator.createMortgageCalculator = function(object){

	// set values for calculations
	var total_loan_amount             = parseInt(object.loan_amount); 
	var loan_cashout                  = parseInt(object.cashout_amount) || 0;
	total_loan_amount                 += loan_cashout;
	var interest_rate                 = parseFloat(object.interest_rate);
	var term_in_years                 = parseInt(object.term_in_years);
	var listed_house_value            = parseInt(object.listed_house_value) || total_loan_amount;
	var down_payment                  = parseInt(object.down_payment) || 0;
	var lender_fees                   = parseInt(object.lender_fees) || 0;
	var additional_payment            = parseFloat(object.additional_payment) || 0;
	var primary_mortgage_insurance    = parseFloat(object.primary_mortgage_insurance) || NationalPMIAvg;
	var annual_property_insurance_rate= parseFloat(object.annual_property_insurance_rate) || NationalInsuranceRateAvg;
	var annual_hoa_fee                = parseInt(object.annual_hoa_fee) || 0;
	var loan_state 										= object.state || DefaultPropertyTaxState;
	loan_state 												= loan_state.toUpperCase();
	
	var annual_property_tax_rate 			= parseFloat(object.annual_property_tax_rate) || NationalPropertyTaxAvg;
	if(annual_property_tax_rate == 0 || loan_state != "NONE"){
		annual_property_tax_rate 	  		= parseFloat(annual_property_tax_table_2018[loan_state]) || NationalPropertyTaxAvg;
	}
	
	if('property_tax' in object){
		var annual_property_tax                   = parseFloat(object.property_tax) || 0;
	} else {
		var annual_property_tax                   = Math.round((annual_property_tax_rate / 100) * listed_house_value);
	}

	if('property_insurance' in object){
		var annual_property_insurance             = parseFloat(object.property_insurance) || 0;
	} else {
		var annual_property_insurance             = ((annual_property_insurance_rate / 100) * listed_house_value);
	}

	// calculate full loan_amount
	var loan_amount                               = total_loan_amount - down_payment + lender_fees;
	// generate principal_in_cents as P
	var principal_in_cents                        = Math.round(CentsPerDollar * loan_amount);
	// generate monthly_interest_rate as r
	var monthly_interest_rate                     = (interest_rate / 100) / MonthsPerYear;
	// generate term_in_months as N
	var term_in_months                            = term_in_years * MonthsPerYear;
	// generate effective_annual_rate as E where E= (1+r)^N-1
	var effective_annual_rate                     = parseFloat(Math.pow( 1+monthly_interest_rate, term_in_months ) - 1);
	// generate additional_payment_in_cents
	var additional_payment_in_cents               = Math.round(CentsPerDollar * additional_payment);
	// generate monthly_property_tax
	var annual_property_tax_in_cents              = Math.round( (annual_property_tax || annual_property_tax) * 100);
	var monthly_property_tax_in_cents             = Math.round(annual_property_tax_in_cents / MonthsPerYear);
	// generate monthly_property_insurance
	var monthly_property_insurance_in_cents       = Math.round( (annual_property_insurance * CentsPerDollar) / MonthsPerYear );
	// generate monthly_hoa_fee_in_cents
	var monthly_HOA_dues_in_cents                 = Math.round( (annual_hoa_fee * CentsPerDollar) / MonthsPerYear );
		
	return fromPrototype(LoanCalculator, {
		// test created variables
		//test_output : function(){
		// 	console.log("Initial Loan: $" + loan_amount);
		//},

		// calculate base monthly_payment on a loan based on object parameters
		// @requirements: 
		//				loan_amount > 0
		//				interest_rate >= 0
		//				term_in_years > 0
		// @optional: additional_payment_in_cents
		// @return: monthly_payment in dollars, property_tax monthly in dollars
		baseMonthlyPayment: function(){
			var monthly_payment = [];
			//verify required values exist and build function
			if( !('loan_amount' in object) || !('interest_rate' in object) || !('term_in_years' in object) ){
				console.error("One of the required variables in missing in call to createMortgageCalculator.monthlyPayment");
				return 0;
			}

			//verify that required values can give proper output
			if( isNaN(loan_amount) || isNaN(interest_rate) || isNaN(term_in_years) ){
				console.error("Wrong variable types in call to createMortgageCalculator.monthlyPayment");
				return 0;
			}

			// monthly payment defined as (from wikipedia):
			// if r=0, payment = P/N
			// else payment = (r*P*(E+1)/(E)
			monthly_payment.total = additional_payment_in_cents;
			if(monthly_interest_rate <= 0){
				monthly_payment.total += Math.round(principal_in_cents / monthly_interest_rate);
			} else {
				monthly_payment.total += Math.round(
					(monthly_interest_rate * principal_in_cents * (effective_annual_rate + 1)) / 
					(effective_annual_rate) )
			}
			
			// convert monthly payment to dollars
			monthly_payment.total /= CentsPerDollar;
			monthly_payment.property_tax = Math.round((annual_property_tax_rate * listed_house_value / MonthsPerYear)/CentsPerDollar);
			monthly_payment.pmi = Math.round(((primary_mortgage_insurance/100 * principal_in_cents)/MonthsPerYear)/CentsPerDollar);

			return monthly_payment;
		},

		// calculate the additional fees that are monthly payments but are not part of the mortgage payment
		// some of these calculations are redundant
		// @requirements:
		//				monthly_property_tax_in_cents
		//				monthly_property_insurance_in_cents
		//				monthly_HOA_dues_in_cents
		// @optional:
		// 				primary_mortgage_insurance
		// 				primary_mortgage_insurance
		// 				principal_in_cents
		// @return additional_fees as itemized fees and a sum of those fees
		addMonthlyPayment: function(){
			additional_fees = {};

			// store monthly_property_tax_in_cents
			additional_fees.monthly_property_tax_in_cents = monthly_property_tax_in_cents;
			// store monthly_property_insurance_in_cents
			additional_fees.monthly_property_insurance_in_cents = monthly_property_insurance_in_cents;
			// store monthly_HOA_dues_in_cents
			additional_fees.monthly_HOA_dues_in_cents = monthly_HOA_dues_in_cents;

			// calculate monthly payment of pmi if required
			var pmi_per_month_in_cents = 0;
			if(primary_mortgage_insurance > 0){ pmi_per_month_in_cents = (primary_mortgage_insurance * principal_in_cents)/12/100; }
			additional_fees.pmi_per_month_in_cents = pmi_per_month_in_cents;

			//calculate total_fees due based on all stored values
			var total_fees_in_cents = 0;
			for(var key in additional_fees){
				total_fees_in_cents += additional_fees[key];
			}
			additional_fees.total_fees = total_fees_in_cents / CentsPerDollar;
			return additional_fees;
		},

		// create an object to hold a payment, inner function usage
		storePayment: function(principal_remaining_in_cents, principal_paid_in_cents, interest_paid_in_cents, additional_fees, current_month, current_year){
			return {
				principal_remaining: Math.round(principal_remaining_in_cents) / 100,
				principal_paid     : Math.round(principal_paid_in_cents) / 100,
				interest_paid      : Math.round(interest_paid_in_cents) / 100,
				additional_fees    : Math.round(additional_fees) / 100,
				monthly_payment    : Math.round(principal_paid_in_cents + interest_paid_in_cents + additional_fees) / 100,
				current_month      : current_month,
				current_year       : current_year,
			};
		},

		// store payment schedule (this prevents a stack overflow), inner function usage
		storePaymentSchedule: function(loan, payments)
		{
			return {
				loan: loan,
				payments: payments,
			};
		},

		// create a monthly dimensional array of all payments to be made on the loan
		// @requirements: all requirements of Calculator.createMortgageCalculator->baseMonthlyPayment and addMonthlyPayment
		// @return return_data as an array of all payments and subvalue calculations per payment
		paymentSchedule: function(){

			// build variables for calculations
			// if dates are not supplied, use next month
			if(!('start_year' in object) || !('start_month' in object) || !('start_day' in object)){
				var date = this.dateCreation();
			} // else use dates specified
			else {
				start_year = parseInt(object.start_year);
				start_month = parseInt(object.start_month);
				start_day = parseInt(object.start_day);

				// check dates specified are valid and build date
				if(isNaN(start_year) || isNaN(start_month) || isNaN(start_day)){
					console.error("Wrong variable types for dates sent to createMortgageCalculator.paymentSchedule");
					return 0;
				} else {
					var date = new Date( object.start_year, object.start_month, object.start_day );
					date = this.dateCreation(date);
				}
			}
			
			// build object to hold payment schedule
			var payments = {};

			// build array as object
			for(var i = date.year; i <= date.year + term_in_years; ++i){
				payments[i] = {};
				for(var j = 1; j <= MonthsPerYear; ++j){
					payments[i][j] = [];
				}
			}
			
			var current_year = date.year;
			// start month is 1 month after this one
			var current_month = date.month++;
			if(current_month > MonthsPerYear){
				current_month = 1;
				current_year++;
			}
			var current_principal = principal_in_cents;

			// get monthly_payment from Calculator.createMortgageCalculator->baseMonthlyPayment()
			var base_monthly = this.baseMonthlyPayment();
			var monthly_payment_in_cents = Math.round(base_monthly.total * 100);

			//get additional payments if required
			var additional_fees = this.addMonthlyPayment();

			// get pmi_per_month_in_cents
			var pmi_per_month_in_cents = additional_fees.pmi_per_month_in_cents;

			// formula based on function found on wikipedia
			for(var months = 0; months < term_in_months; months++){
				// calculate whether pmi is still paid
				// this is where variable pmi table would be used
				if(current_principal <= (LoantoValueRatio * total_loan_amount*CentsPerDollar)){ pmi_per_month_in_cents = 0; }

				// calculate additional_items_in_cents paid for this month
				var additional_items_in_cents = monthly_property_insurance_in_cents + monthly_property_tax_in_cents + pmi_per_month_in_cents;
				// get interest_paid_in_cents for this month
				var interest_paid_in_cents = Math.round(current_principal * monthly_interest_rate);
				// get principal_paid_in_cents this month
				var principal_paid_in_cents = monthly_payment_in_cents - interest_paid_in_cents;

				if(principal_paid_in_cents > current_principal){ principal_paid_in_cents = current_principal; }

				// remove amount of principal_paid_in_cents from the current_principal to get the new principal owed
				current_principal -= 			principal_paid_in_cents;
				// save the payment made to return
				var payment = this.storePayment(
					current_principal, 
					principal_paid_in_cents, 
					interest_paid_in_cents, 
					additional_items_in_cents, 
					current_month, 
					current_year
				);
				payments[current_year][current_month] = payment;

				// check to see if payments are complete
				if(current_principal <= 0){ break; }

				// increase month and year as required
				current_month++;
				if(current_month > MonthsPerYear){
					current_month = 1;
					current_year++;
				}
			}

			var return_data = this.storePaymentSchedule( this, payments );

			return return_data;
		}

	});
};

//---BEGIN TEST DATA---///
// create test object with basic values and optional values for calculation
// based on calculations verified at: 
var test_mortgage = {
	loan_amount 										: "250000",
	term_in_years										: "30",
	interest_rate 									: "4.125",
	// optional values for testing
	down_payment										: "25000",
	additional_payment 							: "0",
	primary_mortgage_insurance			: "0.05",
	annual_property_tax_rate				: "1.2",
	annual_property_insurance_rate	: "0.6",
	listed_house_value							: "275000",
	annual_hoa_fee									: "0.0",
	cashout_amount									: "10000"
};

// start timer
var start = new Date();

// create MortgageCalculator object
var calc = LoanCalculator.createMortgageCalculator(test_mortgage);
// get monthly payment from the calculator
var monthly_payment = calc.baseMonthlyPayment();
var add_monthly = calc.addMonthlyPayment();
// get a payment schedule from the calculator
var payment_schedule = calc.paymentSchedule();
console.log("Calculated Monthly Payment: $" + monthly_payment.total);
console.log("Additional per Month: $" + add_monthly.total_fees);
console.log(add_monthly);
console.log(payment_schedule);

// end timer
var end = new Date();
var time = end-start;
console.log("exe time: " + time +" ms");
/*---END TEST DATA---*/