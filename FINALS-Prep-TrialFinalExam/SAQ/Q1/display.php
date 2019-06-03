<?php
// display.php 
// code to generate sample output

require_once 'common.php';

$dao = new ProductDAO();
$productArr = $dao->retrieveAll();

echo "<html><body>";
print_form($productArr);
echo "</body></html>";

function print_form($productArr)
{
    // YOUR CODE GOES HERE
    echo "<form action='order.php' method='post'>";
    echo "<table border='1'>";
    echo "  <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
            </tr>";
    foreach ($productArr as $product) {
        $id = $product->getID();
        echo "<tr>
                <td>{$product->getName()}</td>
                <td>{$product->getPrice()}</td>
                <td>";
        echo "    <select name='item[]'>
                    <option value='' selected disabled>-- Pick a size --</option>";
        foreach ($product->getStock() as $size => $qty) {
            if ($product->hasStockBySize($size)) {
                echo "<option value='$id-$size'>$size</option>";
            }
        }
        echo "    </select>
                </td>
            </tr>";
    }
    echo "<tr>
            <td colspan='3'><input type='submit' value='Order'></td>
          </tr>";
    echo "</table>";
    echo "</form>";
}


?>

<!--<input type="password" name="password">-->
