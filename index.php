<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Conestoga Pizzeria</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/bootstrap.js"></script>
        <script src="js/script.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#phone').mask('(999)999-9999');
                $('#numberOfPizza').mask('99');
                
                var max_fields      = 2; //maximum input boxes allowed
                var wrapper         = $("#select_new_toppings"); //Fields wrapper
                var add_button      = $("#add_new_toppings"); //Add button ID

                var x = 0; //initlal text box count
                $(add_button).click(function(e){ //on add input button click
                    e.preventDefault();
                    if(x < max_fields){ //max input box allowed
                        x++; //text box increment
                        $(wrapper).append("<div><select class=\"form-control\" name=\"toppings\">\n" +
            "                                    <option value=\"Sausage\">Sausage</option>\n" +
            "                                    <option>Pepperoni</option>\n" +
            "                                    <option>Beef</option>\n" +
            "                                    <option>Bacon</option>\n" +
            "                                    <option>Chicken</option>\n" +
            "                                    <option>Ham</option>\n" +
            "                                    <option>Olive</option>\n" +
            "                                    <option>Pepper</option>\n" +
            "                                    <option>Tomato</option>\n" +
            "                                    <option>Mushroom</option>\n" +
            "                                    <option>Pineapple</option>\n" +
            "                                </select><a href='#' class='remove_field'>Remove</a></div>"); //add input box
                    }
                    });

                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault(); $(this).parent('div').remove(); x--;
                    })
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                 <a class="navbar-brand" href="index.jsp">Conestoga Pizzeria</a>
            </div>
        </nav>
        <form class="form-horizontal" method="post" action="orderSummary.php" onsubmit="return isRegistrationFormValid();">
        <div class="col-xs-12">
            <label class="error-label col-xs-12" id="error"></label> 
            <?php
                if($_GET['error'] != null)
                {
                    if($_GET['error'] == "1")
                    {
                        ?>
                        <label class="error-label col-xs-12" id="error">Please correctly input the Telephone Number.</label>             
                        <?php
                    }
                    else if($_GET['error'] == "2")
                    {
                        ?>
                        <label class="error-label col-xs-12" id="error">Please correctly input the number of pizzas.</label>             
                        <?php
                    }
                    else if($_GET['error'] == "3")
                    {
                        ?>
                        <label class="error-label col-xs-12" id="error">Order Not Written Successfully</label>             
                        <?php
                    }
                }
            ?>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                       <h3 class="panel-title">Enter Personal Information</h3>
                    </div>
                    <div class="col-md-12">
                        <label class="col-xs-12">All Fields are mandatory</label>                         
                    </div>
                    <div class="panel-body"> 
                        
                        <div class="form-group">
                            <label for="forename" class="control-label col-xs-4">Forename</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="forename" name="forename" placeholder="Forename"/>
                            </div>                             
                        </div>
                        <div class="form-group">
                            <label for="surname" class="control-label col-xs-4">Surname</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label col-xs-4">Address</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label col-xs-4">City</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postalcode" class="control-label col-xs-4">Postal Code</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="A1A1A1"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="control-label col-xs-4">Province</label>
                            <div class="col-xs-4 selectContainer">
                                <select class="form-control" id="province" name="province">
                                        <option>Ontario</option>
                                        <option>British Columbia</option>
                                        <option>Manitoba</option>
                                        <option>Saskatchewan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label col-xs-4">Telephone Number</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="(555)555-5555"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-xs-4">Email</label>
                            <div class="col-xs-4">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"/>
                            </div>
                            <label class="error col-xs-4" id="error-email"></label>
                        </div>                            
                    </div>   
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                       <h3 class="panel-title">Enter Order Details</h3>
                    </div>
                    <div class="panel-body">                       
                        <div class="form-group">
                            <label for="numberOfPizza" class="control-label col-xs-4">Number of Pizza</label>
                            <div class="col-xs-3">
                                <input type="text" class="form-control" id="numberOfPizza" name="numberOfPizza" value="0"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sizeOfPizza" class="control-label col-xs-4">Size of Pizza</label>
                            <div class="col-xs-4 selectContainer">
                                <select class="form-control" name="sizeOfPizza">
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                    <option>Extra Large</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="control-label col-xs-4">Type of Crust</label>
                            <div class="col-xs-4 selectContainer">
                                <select class="form-control" name="crust">
                                    <option>Hand-tossed pizza</option>
                                    <option>Pan pizza</option>
                                    <option>Stuffed crust</option>
                                    <option>Thin crust</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="control-label col-xs-4">Toppings</label>
                            <div class="col-xs-4">
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Sausage">Sausage</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Pepperoni">Pepperoni</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Beef">Beef</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Bacon">Bacon</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Chicken">Chicken</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Ham">Ham</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Olive">Olive</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Pepper">Pepper</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Tomato">Tomato</div>
                                <div class="checkboxContainer"><input type="checkbox" name="toppings[]" value="Mushroom">Mushroom</div>
                                <div class="checkboxContainer"> <input type="checkbox" name="toppings[]" value="Pineapple">Pineapple</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="control-label col-xs-4"></label>
                            <div class="col-xs-4 selectContainer" id="select_new_toppings"></div>
                        </div>
                    </div>   
                </div>
            </div>
            
        </div>
        <div class="col-md-6">
           
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <input type="submit" class="btn btn-primary" value="Submit Order"/>
                </div>
            </div>
        </div>
        
        </form>
    </body>
</html>
