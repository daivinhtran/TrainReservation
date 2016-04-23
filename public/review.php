<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $rows = query("SELECT * FROM train_route");

    	foreach ($rows as $row)
    	{
            $train_numbers[] = [
                "train_number" => $row["train_number"],
            ];
    	}
    	//echo($cash[0]["cash"]);
    	// render portfolio
    	if(empty($train_numbers))
    		redirect("/");
    	else
    		render("review_form.php", ["train_numbers" => $train_numbers, "title" => "Review"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        query("INSERT INTO review (review_number, username, train_number, comment, rating) VALUES(?, ?, ?,?,?)",
        1, $_SESSION["username"], $_POST["trainNum"], $_POST["comment"], $_POST["rating"]);
        redirect("/");
    }

?>
