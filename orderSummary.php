<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ConestogaPizzeria</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <?php
            include('Pizza.php');
            include('PizzaOrder.php');
        
            $forename = $_POST['forename'];
            $surname = $_POST['surname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $postalcode = $_POST['postalcode'];
            $province = $_POST['province'];
            $phone = "";
            $email = $_POST['email'];
            $numberOfPizza = 0;
            $sizeOfPizza = $_POST['sizeOfPizza'];
            $crust = $_POST['crust'];
            $toppings = $_POST['toppings'];
            
            echo $sizeOfPizza;
            
            $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
            if(!preg_match($regex, $_POST['phone']))
            {
				header('Location: index.php?error='.urlencode('1'));  
            }
            else
            {
                $phone = $_POST['phone'];
            }
            
            if(!$_POST['numberOfPizza']>0)
            {
				header('Location: index.php?error='.urlencode('2'));  
            }
            else
            {
                $numberOfPizza = $_POST['numberOfPizza'];
            }
            
            print_r($toppings);
            
			$pizza = new Pizza($forename, $surname, $address, $city, $postalcode, $province, $phone, $email, $numberOfPizza, $sizeOfPizza, $crust, $toppings);
		    
		//	$pizza = new Pizza;
		//	$pizza->setForeName($forename);
			echo "p".$pizza->getForeName();
			echo "province".$pizza->getProvince();
            $pizzaOrder = new PizzaOrder;
       
            
            
            $subTotalAmount = $pizzaOrder->processOrder($pizza);
            
            echo "subtax".$subTotalAmount;
            $totalTax = $pizzaOrder->getTotalTax($pizza, $subTotalAmount);
            $totalAmount = $totalTax + $subTotalAmount;
            
            echo $totalTax;
            echo "total".$totalAmount;
            $fullname = $forename . ' '  . $surname;
            echo $fullname;
            
            /*
            if(pizzaOrder.writeOrderToFile(fullname, province, numberOfPizza, sizeOfPizza, crust, toppings, totalTax, totalAmount))
            {
				header('Location: index.php?error=3');  
            }
            */
            
        ?>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                 <a class="navbar-brand" href="index.jsp">Conestoga Pizzeria</a>
            </div>
        </nav>
        <form class="form-horizontal" method="post" onsubmit="return isRegistrationFormValid();">
        <div class="col-xs-12">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                       <h3 class="panel-title">Order Summary</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Name : </label>
                            <div class="col-xs-4">
                                <?php echo $fullname ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Province : </label>
                            <div class="col-xs-4">
                                <?php echo $province ?>
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Number Of Pizza : </label>
                            <div class="col-xs-4">
                                <?php echo $numberOfPizza ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Size Of Pizza : </label>
                            <div class="col-xs-4">
                                <?php echo $sizeOfPizza ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Type Of Crust : </label>
                            <div class="col-xs-4">
                                <?php echo $crust ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Toppings : </label>
                            <div class="col-xs-4">
                                <?php
                                    /*for(int i=1;i<=toppings.length;i++)
                                    {
                                        out.print(i+". "+toppings[i-1]+" ");                                      
                                    }*/
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Sub Total : </label>
                            <div class="col-xs-4">
                                <?php echo $subTotalAmount ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Total Tax : </label>
                            <div class="col-xs-4">
                                <?php echo $totalTax ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Total Amount : </label>
                            <div class="col-xs-4">
                                <?php echo $totalAmount ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <a href="index.php" class="btn btn-primary">New Order</a>
        </div>
        
    </body>
</html>
