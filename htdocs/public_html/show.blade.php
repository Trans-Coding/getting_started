<?php
  //assuming that this array is delivered by the controller to the view
  $application = array(
    'reason1' => '<div>I have a great understanding of building relationships with customers. At my current employment, there is an emphasis to create relationships between lenders and borrowers. However,</div>',
    'reason2' => '<div>I want to learn from new challenges in a place that harbors growth from its employees. BHHC is an ideal place to thrive, providing challenges for personal growth as I create applications that make a difference in the world.</div>',
    'reason3' => '<div>I make sophisticated calculators that run extremely fast on host machines! Example included and more advanced version found <a href="https://www.magillaloans.com/loans/calculators/home-mortgage-calculator/">here</a>.</div>'
  );
?>

<!DOCTYPE html>
<style>
  body{
    font-family: 'Nunito', sans-serif;
  }
  .job-image{
    width: 100%;
    border: 3px solid #55cdfc;
    border-radius: 15px;
    margin-bottom: 5px;
  }
  #main_top{
    background-color: #55cdfc;
    font-size: 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
  h1, h3{
    padding: 0px;
    margin-bottom: 0px !important;
  }
  .section_holder{
    border-top: 5px solid;
    border-color: #f7a8b8;
    margin-top: 20px; 
  }
  .section_holder a:link{
    color: #55cdfc;
  }
  #accordion{
    margin: 40px;
  }
  #accordion a:link{
    color: #55cdfc;
  }
  #dataForm{
    background-color: #55cdfc;
    padding: 20px;
    padding-bottom: 10px;
  }
  #calcOut{
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
</style>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Jade Selke's BHHC Application</title>
    <meta name="description" content="Jade Selke's BHHC Application, presenting reasons why she actually is the better candidate for this position!">
    <meta name="author" content="Jade Selke">
    <!-- Imports for Bootstrap, Google Fonts, and FontAwesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="/public_html/pictures/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public_html/pictures/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public_html/pictures/favicon-16x16.png">
    <link rel="manifest" href="/public_html/pictures/site.webmanifest">
    <link rel="mask-icon" href="/public_html/pictures/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/public_html/pictures/favicon.ico">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-config" content="/public_html/pictures/browserconfig.xml">
    <meta name="theme-color" content="#941919">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>

    <!--top section holder of page-->
    <div id="main_top">
      <div class="col-12">
        <h1>Jade Selke's BHHC Application</h1>
      </div>
    </div>

    <!--navbar creation using BootStrap's built in methods-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="/public_html/" target="_top"><img src="logo_trans.png" width="130" height="60"/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/public_html/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/public_html/resume.php">Resume</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/public_html/show.blade.php">BHHC Application</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- Explanation of the page -->
    <div class="section_holder">
      My name is Jade, I graduated just a little over a year ago; since then, I have worked continuosly at <a href="https://magillaloans.com" target="_blank">Magilla Loans</a>. I also started a <a href="https://www.youtube.com/channel/UCNJNQY4qKnjWor3yqjBEHsg" target="_blank">YouTube channel</a> and this webpage to show others in the field how to get a job in the tech world doing what we love. This section of the website, however, is just for you! I want to explain a few things that make me an asset to Berkshire Hathaway Homestate Companies' Develpoment Team:
    </div>

    <!--Why me?-->
    <div class="section_holder">
      This next section assumes that there is a proper pull of the $application array from the database, which is displayed below using a simple for loop construction in PHP.
      <br>
      
      <!-- begin accordion section for reasons -->
      <div id="accordion">
        <div class="col-12 row">
          <div class="font-weight-bold">
            <a href="#" data-toggle="collapse" data-target="#reasons" aria-expanded="false" aria-controls="reasonsLink"><i class="far fa-caret-square-down" style="color:#f7a8b8;"></i>Reasons YOU should hire Jade Selke right now!</a>
          </div>
        </div>
        <div class="col-12 collapse" id="reasons" aria-labelledby="reasonsAccordion" data-parent="#accordion">
          <ol>
            <?php
              foreach($application as $value){
                echo '<li>' . $value . '</li>';
              }
            ?>
          </ol>
      </div>
    </div>

    <!-- Sample Calculator -->
    <!-- Calculator inputs -->
    <div id="dataForm" class="section_holder row">
      <div class="col-sm-4">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Loan Amount $</span>
          </div>
          <input type="text" name="loanAmount" id="loanAmount" class="form-control" min="0" value="250,000" aria-label="loanAmount" aria-describedby="loanAmount for loan">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Loan Term (years)</span>
          </div>
          <select name="loanTerm" id="loanTerm" class="form-control">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="30" selected="">30</option>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group mb-3">
          <span class="input-group-text">Interest Rate (as %)</span>
          <input type="text" name="interestRate" id="interestRate" class="form-control" min="0" value="4.125">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group mb-3">
          <span class="input-group-text">Down Payment (as %)</span>
          <input type="text" name="downPayment" id="downPayment" class="form-control" min="0" value="10">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group mb-3">
          <span class="input-group-text">Property Insurance (as %)</span>
          <input type="text" name="propertyInsurance" id="propertyInsurance" class="form-control" min="0" value="0.6">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group mb-3">
          <span class="input-group-text">PMI Rate (as %)</span>
          <input type="text" name="pmiRate" id="pmiRate" class="form-control" min="0" value="0.05">
        </div>
      </div>
    </div>
    <!-- Place holder for calculator output -->
    <div id="calcOut" class="col-12">
      <h4>Average Calculated Monthly Payments</h4>
      <div id="timerOut" style="text-align: right">time</div>
      <table class="table" style="border: 5px solid #f7a8b8">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Base Payment</th>
            <th scope="col">Taxes and Fees</th>
            <th scope="col">Total Payment</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th id="baseMonthly" scope="row">value 1</th>
            <th id="baseExtra" scope="row">value 2</th>
            <th id="totalMonthly" scope="row">value 3</th>
          </tr>
        </tbody>
      </table>
    </div>

    <!--import scripts for jQuery and Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript" src="calc.js"></script>

<script type="text/javascript">
  //grab initial divs to prevent repeatedly crawling
  $baseMonthly = $('#baseMonthly');
  $baseExtra = $('#baseExtra');
  $totalMonthly = $('#totalMonthly');
  $timer = $('#timerOut');

  //create initial calculator
  var calculator = LoanCalculator.createMortgageCalculator(getLoanData());
  
  $(document).ready(function(){
    updatePage();
  });
  $(".form-control").change(function(){
    updatePage();
  });
  // Add commas to loan amount
  $('input[name=loanAmount]').on('keyup', function(){
    // Sanitize value
    var i = $('input[name=loanAmount]').val().replace(/[\D\s\._\-]+/g, "");
    // Add commas
    var n = Number(i).toLocaleString();
    // Use new value
    $('input[name=loanAmount]').val(n);
  })
  function updatePage(){
    var monthly = calculatePayment();
    $baseMonthly.html("$" + monthly.base);
    $baseExtra.html("$" + monthly.additional);
    $totalMonthly.html("$" + monthly.total);
    $timer.html("Compute time: " + monthly.timer + " ms");
  };
  function getFullMonthName(monthNumber) {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return months[monthNumber-1];
  }
  function getAbrvMonthName(monthNumber) {
      var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
      return months[monthNumber-1];
  }
  function getLoanData(){
    // Array of the inputs
    var $inputs = $('#dataForm :input');
    // Array of the inputs values
    var values = {};
    $inputs.each(function() {
        values[this.name] = $(this).val();
    });
    //console.log(values);
    
    // Add values to respective loan data variables
    var loanamount = values.loanAmount.replace(/[\D\s\._\-]+/g, ""); // sanitize value
    var term = values.loanTerm;
    var rate = values.interestRate;
    var downpayment = (values.downPayment / 100) * loanamount;
    if(values.downPayment >= 20){
      var pmi = 0;
    }else{
      var pmi = values.pmiRate;
    }
    var propertyinsurancerate = values.propertyInsurance;
    // remove pmi option if it is not applicable
    if(values.downpayment >= 20){
      $('#pmiInput').css('visibility','hidden');
    } else {
      $('#pmiInput').css('visibility','visible');
    }
    // Inject loan data variables into the loan data object
    loan_data = {
      loan_amount : loanamount,
      term_in_years : term,
      interest_rate : rate,
      down_payment : downpayment,
      primary_mortgage_insurance : pmi,
      annual_property_insurance_rate : propertyinsurancerate
    };
    return loan_data;
  }
  function calculatePayment(){
    // start timer
    var start = new Date();
    calculator = LoanCalculator.createMortgageCalculator(getLoanData());
    // get a payment schedule from the calculator
    var payment_schedule = calc.paymentSchedule();
    console.log(payment_schedule);
    console.log(calculator.baseMonthlyPayment());
    //get just monthly values
    var monthly_payment = {
      base : calculator.baseMonthlyPayment().total,
      additional : calculator.addMonthlyPayment().total_fees
    }
    monthly_payment['total'] = monthly_payment['base'] + monthly_payment['additional'];

    monthly_payment['total'] = (Math.round(monthly_payment['total'] * 100) / 100).toFixed(2);
    monthly_payment['base'] = (Math.round(monthly_payment['base'] * 100) / 100).toFixed(2);
    monthly_payment['additional'] = (Math.round(monthly_payment['additional'] * 100) / 100).toFixed(2);
    // end timer
    var end = new Date();
    var time = end-start;
    monthly_payment['timer'] = time;
    return monthly_payment;
  }
</script>