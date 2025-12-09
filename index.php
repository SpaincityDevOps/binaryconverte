<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINARY CONVERTER</title>
    <link rel="stylesheet" href="styles.css">
</head>
<div id="all">
    <div id="page">
        <header>
        <h1>SPAINCITY BINARY CONVERTER</h1>
        <p>Welcome to SPAINCITY where we converte decimal numbers into binary.</p>
    </header><br><br>
    <body>
        <form action="index.php" method="post">
        INPUT DECIMAL NUMBER TO CONVERTE TO BINARY
            <br><br>
            <input type="text" id="number" name="number"><br><br>
            <input type="submit" id="button">
        </form>
        <main>
            <style>
                main{
                    color: black;
                    background-color: rgb(187, 38, 185);
                    margin-left: 200px;
                    margin-right: 200px;
                }
            </style>
            <?php
                // Check if the form was submitted (i.e., 'number' is present in the POST data)
                if (isset($_POST["number"])) {
                    // Get the input number and ensure it's treated as an integer
                    $num = (int)$_POST["number"];
                    // Validate if the input is a non-negative integer
                    if ($num < 0) {
                        echo "Please enter a non-negative integer.";
                    } elseif ($num == 0) {
                        // Special case: Binary of 0 is 0
                        $binary_result = "0";
                        echo "<p>The decimal number {$_POST["number"]} converts to binary: $binary_result</p>";
                    } else {
                        $module = []; // Initialize an array to hold the remainders (modulos)
                        
                        // The core conversion loop (Division by 2 method)
                        while ($num > 0) {
                            // 1. Calculate the remainder (the next binary digit)
                            // Use the modulo operator (%)
                            $remainder = $num % 2; 
                            
                            // 2. Add the remainder to the beginning of the array.
                            // array_unshift is more efficient than pushing and then reversing the whole array.
                            // Alternatively, use array_push and reverse later, but unshift is better here.
                            array_unshift($module, $remainder); 
                            
                            // 3. Update the number by integer division (floor division) by 2
                            // Use (int) casting to perform integer division
                            $num = (int)($num / 2); 
                        }
                        
                        // Join the array elements into a single string for the final binary number
                        $binary_result = implode("", $module);
                        
                        echo "<h2>Conversion Result:</h2>";
                        echo "<p>The decimal number {$_POST["number"]} converts to binary: $binary_result</p>";
                    }
                }
                // These messages should be outside the main conversion logic, perhaps in the HTML structure or displayed always.
            ?>
        </main>
        <div>
            <br>Thank you for using Spaincity Binary converter!
            <br>This is SPAINCITY at your service
        </div>
    </body>
    </div>
</div>
</html>