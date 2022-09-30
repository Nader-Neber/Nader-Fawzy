<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <form method="get">
        <div class="row w-100">
            <div class="col-3 offset-4 mt-5">
                    <div class="form-group">
                        <label for="Clientname">Client name</label>
                        <input type="text" class="form-control" name="Clientname" id="Clientname" aria-describedby="helpId"
                            placeholder="Enter your name" value="<?= $_GET['Clientname'] ?? "" ?>">

                        <label for="city" >Client City</label>
                        <input type="text" class="form-control" name="city" id="city" aria-describedby="helpId"
                            placeholder="Enter your city" value="<?= $_GET['city'] ?? "" ?>">

                        <label for="num_of_products">Number of products</label>
                        <input type="text" class="form-control" name="num_of_products" id="num_of_products"
                            aria-describedby="helpId" placeholder="Enter number of products you wish to add"
                            value="<?= $_GET['num_of_products'] ?? "" ?>">


                        <button class="btn btn-outline-primary w-27 my-2">Enter Products</button>
                    </div>
            </div>
        </div>
    </form>
    <?php

        function addProducts($numberOfProducts) : string
        {
            $productForm = '   <form method="post">    <table class="table">
            <thead class="thead-light  text-center">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>';
            for($i = 0 ; $i<$numberOfProducts;$i++)
            {
                $productForm .= " <tr class='text-center '>
                <td><input type='text' class = 'form-control' id='product_name{$i}' name='product_name_{$i}' placeholder = 'Enter product name'></td>
                <td><input type='text' class = 'form-control'  id='price{$i}' name='price_{$i}' placeholder = 'Enter price'></td>
                <td><input type='text' class = 'form-control'  id='quantity{$i}' name='quantity_{$i}' placeholder = 'Enter quantity'></td>
            </tr>";
            }
            $productForm .= "</tbody> </table> 
            <input type='submit' class = 'form-control'  id='submit' name='submit' value='submit'>
            </form>";
            return $productForm;
        }

        function showRecieption() : string
        {
            $total = 0;
            $reciept = "<table class='table mb-5 text-center'>
            <thead class='thead-light '>
                <tr>
                    <th scope='col'>Product name</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Quantities</th>
                    <th scope='col'>Sub total</th>
                </tr>
            </thead>
            <tbody>";
            $subTotal = 0;
            for($i=0; $i<$_GET['num_of_products']; $i++)
            {
                $subTotal = $_POST["price_{$i}"] * $_POST["quantity_{$i}"]; 
                $total += $subTotal;
                $reciept.="
                <tr>
                    <td>{$_POST["product_name_{$i}"]}</td>
                    <td>{$_POST["price_{$i}"]} EGP</td>
                    <td>{$_POST["quantity_{$i}"]}</td>
                    <td>{$subTotal} EGP</td>
                </tr>";
            }
            $_GET['city'] = strtolower($_GET['city']);
            $reciept .= "             </tbody>
            </table>   <table class='table'>
            <tbody>
    
                <tr>
                    <th scope='row'>Client name</th>
                    <td>{$_GET['Clientname']}</td>
                </tr>
                <tr>
                    <th scope='row'>City</th>
                    <td>{$_GET['city']}</td>
                </tr>
                <tr>
                    <th scope='row'>Total</th>
                    <td>";

            $reciept .= "{$total} EGP</td>
            </tr>
            <tr>
                <th scope='row'>Discount</th>
                <td>";

                $discount = 0.0;
                if($total >= 1000.0 && $total < 3000.0)
                {
                    $discount = $total * 0.10;
                }
                elseif(3000.0 <= $total && $total < 4500.0)
                {
                    $discount = $total * 0.15;
                }
                elseif($total >= 4500.0)
                {
                    $discount = $total * 0.20;
                }
                $totalAfterDiscount = $total - $discount;
                $reciept .= "{$discount} EGP</td>
                </tr>
                <tr>
                    <th scope='row'>Total after discount</th>
                    <td>{$totalAfterDiscount} EGP</td>
                    </tr>
                    <tr>
                        <th scope='row'>Delivery</th>
                        <td>";
                
                

                        $delivery = 0;
                        if(strtolower($_GET['city']) == 'cairo')
                        {
                            $delivery = 0;
                            $reciept.= '0 EGP';
                        }
                        elseif(strtolower($_GET['city'])=='giza')
                        {
                            $delivery = 30;
                            $reciept.= '30 EGP';
                        }
                        elseif(strtolower($_GET['city'])=='alex')
                        {
                            $delivery = 50;
                            $reciept.= '50 EGP';
                        }
                        else
                        {
                            $delivery = 100;
                            $reciept.= '100 EGP';
                        }
                        $netTotal = ($total + $delivery) - $discount;
                        $reciept.= " </td>
                        </tr>
                        <tr>
                            <th scope='row'>Net Total</th>
                            <td> {$netTotal} EGP</td>
                            </tr>
                        </tbody>
                    </table>";
                    return $reciept;
        }
        if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET)
        {
            echo addProducts($_GET['num_of_products']);

        }
        if($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST)
        {
            echo showRecieption();
        }

    ?>









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>