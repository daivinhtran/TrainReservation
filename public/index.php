<?php
	// configuration
	require("../includes/config.php");
	// if(isLogin()){
		if($_SESSION['manager'])
			include "mangerview.php";
		else
			render("../templates/customer_view.php", ["title" => "Portfolio"]);
	// } else {
	// 	include "login.php";
	// }
	//render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "cash" => $cash[0]["cash"]]);
?>
