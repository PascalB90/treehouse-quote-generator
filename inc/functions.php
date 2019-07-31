<?php


/**
 * Load data form data.json and decode it.
 */

$data = file_get_contents("inc/data.json");
$data = json_decode($data, true);


/**
 * This function is checking that the new random quote is not the same as the current quote
 *
 * @param array $data
 * @param Int $currentQuote
 * @return mixed            Get a quote array back
 */


function checkQuote(Array $data, Int $currentQuote) {

    // Get a random Quotenumber

    $randomQuote = rand(0,4);



    if ($randomQuote == $currentQuote && $currentQuote == 4) {
        $quote = $data[$randomQuote -1 ];
        return $quote;
    }
    elseif ($randomQuote == $currentQuote ) {
        $quote = $data[$randomQuote + 1];
        return $quote;
    }
    else {
        $quote = $data[$randomQuote];
        return $quote;
    }

}

/**
 * This function get a new quote from data array after check the quote
 *
 * @param array $data
 * @return mixed|string
 */




function getRandomQuote(Array $data) {

    $newRandomQuote = "";

    if (isset($_POST["id"])) {

        $quote = checkQuote($data,$_POST["id"]);
        $newRandomQuote = $quote;

    }
    else {
        $quote = checkQuote($data,0);
        $newRandomQuote = $quote;

    }

    $newRandomQuote["color"]=random_color();
    return $newRandomQuote;

}


/**
 * This Functions create a random hex-color
 *
 * @return string
 */


function random_color_part() {

        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color(){

    return random_color_part() . random_color_part() . random_color_part();

}






?>






