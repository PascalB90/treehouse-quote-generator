
<?php

require ("inc/functions.php");
$quote = getRandomQuote($data);
include ("inc/header.php");

?>


  <div class="container">
    <div id="quote-box">git

      <?php

      //Rendering the Quote

      foreach ($quote as $key => $item) {


          // Color and Id will be not printed

          if ($key == "id" || $key == "color") {
              continue;

              // Print the source array

          } elseif ($key == "source") {
              echo "<p class=\"$key\">";
              foreach ($item as $key => $value) {
                  echo "<span class=\"$key\"> $value</span>";
              }
              echo "</p>";

              // Print the tags array

          } elseif ($key == "tags") {
              echo "Tags:  ";
              foreach ($item as $items) {
                  echo ucfirst($items) . ", ";
              }

          } else {
              echo "<p class=\"$key\"> $item</p>";

          }
      }
      ?>

    </div>
      <form action="" method="post" name="quoter" id="quoter">
          <input type="hidden" name="id" value="<?php echo $quote["id"]; ?>">
          <input type="submit" id="loadQuote" style="background-color:<?php echo "#".$quote["color"]?>" value="Give me a new Quote"></input>
      </form>


  </div>

<?php include ("inc/footer.php");