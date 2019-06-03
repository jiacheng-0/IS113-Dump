<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );
        
    echo "  <table border='1'>
                <tr>
                    <td></td>
                    <th>Room-1</th>
                    <th>Room-2</th>
                    <th>Room-3</th>
                </tr>
                <tr>
                    <th>09-10</th>
                    <td rowspan='1'>L1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>10-11</th>
                    <td rowspan='7'>L4</td>
                    <td rowspan='2'>L5</td>
                    <td></td>
                </tr>
                <tr>
                    <th>11-12</th>
                    <td></td>
                </tr>
                <tr>
                    <th>12-13</th>
                    <td rowspan='1'>L6</td>
                    <td></td>
                </tr>
                <tr>
                    <th>13-14</th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>14-15</th>
                    <td rowspan='3'>L2</td>
                    <td></td>
                </tr>
                <tr>
                    <th>15-16</th>
                    <td></td>
                </tr>
                <tr>
                    <th>16-17</th>
                    <td rowspan='2'>L3</td>
                </tr>
                <tr>
                    <th>17-18</th>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <br/>
            <h4>Your Answer:</h4>";

    require_once "../display.php";
    $room_allocation =  [
        "Room-1" => [new Lecture("L4",10,7), new Lecture("L1",9,1)],
        "Room-2" => [new Lecture("L2",14,3), new Lecture("L6",12,1), new Lecture("L5",10,2)],
        "Room-3" => [new Lecture("L3",16,2)]
    ];

    require_once "test-A-common.php";
?>