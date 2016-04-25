<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        redirect("/");
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //check whether the reservation is already canceled
        $today = date("Y-m-d H:i:s");
        $new_date = $_POST["new_date"]." 00:00:00";
        if ($new_date <= $today) {
            apologize("The date must be in the future");
        } else {
            query("UPDATE reserves
                            SET departure_date = ?
                            WHERE reservationid = ? AND train_number = ?",
                                $_POST["new_date"], $_POST["reservationid"], $_POST["train_number"]);

            $total_cost = query("SELECT total_cost
                                 FROM reservation
                                 WHERE reservationid = ?", $_POST["reservationid"]);
            $total_cost = $total_cost[0]["total_cost"];
            $updated_total_cost = $total_cost + 50;

            query("UPDATE reservation
                    SET total_cost = ?
                    WHERE reservationid = ?",
                    $updated_total_cost, $_POST["reservationid"]);


            $reserve = query("SELECT * FROM reserves WHERE reservationid = ? AND train_number = ?",
                                $_POST["reservationid"],
                                $_POST["train_number"]);
            $reserve = $reserve[0];
            render("updated_reserve.php", ["reserve" => $reserve, "change" => 50, "updated_total_cost" => $updated_total_cost,
                                        "title" => "Update Reservation"]);
        }

    }

?>
