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
