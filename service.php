<?php 
$file_contents_n =  file_get_contents("data/neg-hel-sk.txt");
$file_contents_p =  file_get_contents("data/pos-hel-sk.txt");
$file_contents_c = file_get_contents("keywords/positives/service.txt");
$explode = explode("\n",$file_contents_n);
$explode2 = explode("\n",$file_contents_p);
$explode3 = explode("\n",$file_contents_c);
$string = "";
$string2 = "";
$string3 = array();
$numerical = "";
$numerical2 = "";
$numerical3 = array();
foreach ($explode as $tuple){
	$tuple_exp = explode(" ", $tuple);
	$string .= "'". $tuple_exp[0] ."',";
	$numerical .= trim($tuple_exp[1]) .",";
	
}

foreach ($explode2 as $tuple){
	$tuple_exp = explode(" ", $tuple);
	$string2 .= "'". $tuple_exp[0] ."',";
	$numerical2 .= trim($tuple_exp[1]) .",";
	
}

foreach ($explode3 as $tuple){
	$tuple_exp = explode("\n", $tuple);
	$string3[] = $tuple_exp[0];
	
}
$length = count($numerical3);

$word = "service";
$pattern = "/$word/i";
$replace = "<b style='color:green;'>$word</b>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Nugget - 'Service'</title>

  <!-- Bootstrap -->
  <link href="src/css/bootstrap.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="src/css/font-awesome.min.css" rel="stylesheet">

  <link href="src/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
  <link href="src/css/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-left" href="../nugget/"><img width="120" src="images/MYOBlogo.png" /></a>
    </div>
  </div>
</nav>

  <div id="wrapper">
    <!-- Main content -->
    <div id="page-content-wrapper">
	<h2 align="center">Reviews - 'Service'</h2>
		<hr />
      <div class="container-fluid">
        <div class="row">
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <i class="fa"></i> Keyword Reviews - Last Month
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div class="list-group">
					  <?php 
					  for( $i = 0; $i<11; $i++ ){
						  if($i % 2 == 0){
							echo '<span style="background-color:#eeeeee;" class="list-group-item">';
						  }else{
							  echo '<span class="list-group-item">';
						  }
							echo '<i class="fa"></i>'. preg_replace($pattern, $replace, $string3[$i]);
						  echo '</span>';
					  }
					  ?>
                      </div>
                      <!-- /.list-group -->
                      <a href="#" class="btn btn-default btn-block">View All Reviews</a>
                  </div>
                  <!-- /.panel-body -->
              </div>
              <!-- /.panel -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="src/js/bootstrap.min.js"></script>
  <script src="src/js/Chart.min.js"></script>
  <!-- Chart.js -->
  <script>
    /*Chart.defaults.global.legend = {
      enabled: false
    };*/

    var ctx = document.getElementById("canvasDoughnut1");
    var cty = document.getElementById("canvasDoughnut2");


    var data1 = {
      labels: [<?php echo $string; ?>],
      datasets: [{
        data: [<?php echo $numerical; ?>],
        backgroundColor: [
          "#A04000",
          "#F1948A",
          "#3498DB",
          "#229954",
          "#F4D03F",
		  "#455C73",
		  "#7D3C98",
		  "#76D7C4",
		  "#0E6251",
		  "#CA6F1E"
        ],
        hoverBackgroundColor: [
        ]

      }]
    };
    var data2 = {
      labels: [<?php echo $string2; ?>],
      datasets: [{
        data: [<?php echo $numerical2; ?>],
        backgroundColor: [
          "#455C73",
		  "#F39C12",
          "#76D7C4",
          "#26B99A",
          "#3498DB",
		  "#9B59B6",
		  "#E74C3C",
		  "#F4D03F",
		  "#229954",
		  "#F1948A",
        ],
        hoverBackgroundColor: [

        ]

      }]
    };

    var canvasDoughnut1 = new Chart(ctx, {
      type: 'doughnut',
      data: data1
    });
    var canvasDoughnut2 = new Chart(cty, {
      type: 'doughnut',
      data: data2
    });
  </script>
  <!-- Menu toggle script -->
  <script>
    $("#menu-toggle").click( function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("menuDisplayed");
    });
  </script>

</body>
</html>
