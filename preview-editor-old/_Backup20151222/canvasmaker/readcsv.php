<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            table td {
                vertical-align: baseline;
                padding: 0;
            }

            td div {
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>
                <?php
                $_1st  = 0;
                $_2nd  = 30;
                $_3rd  = 0;
                $_4th  = 0;
                
                $csvFile = 'colors.csv';
                $file_handle = fopen($csvFile, 'r');
                while (!feof($file_handle) ) {
                        $line_of_text[] = fgetcsv($file_handle, 1024);
                }
                fclose($file_handle);
                for ($i = 0; $i < count($line_of_text); $i++){
                    $tmp = explode(',',$line_of_text[$i][0]);
                        $firstVal   = substr($tmp[0], strpos($tmp[0], "(") + 1) + $_1st;
                        $secondVal  = $tmp[1] + $_2nd;
                        $thirdVal   = $tmp[2] + $_3rd;
                        $fourthVal  = rtrim($tmp[3], ")") + $_4th;
                    $thisColor = "rgba($firstVal,$secondVal,$thirdVal,$fourthVal)";
                        
                ?>        
                    <div style="width: 200px; height: 50px;"><?php echo $thisColor;?></div>
                    <div style="border-width: 1px; border-style: solid; width: 100px; height: 10px; background-color:<?php echo $thisColor; ?>; "></div>
                    <br>                        
                <?php        
                }
                ?>                     

                </td>
<!--                <td style="background-color:cyan">
                    <div style='font-size: 40pt; background-color:yellow;'>
                        Big yellow text
                    </div>
                </td>-->
            </tr>
        </table>
    </body>
</html>