<?php


class PizzaOrder {
    
    public function processOrder($pizza)
    {
       $pizzaOrder = new PizzaOrder;
        //$classb->callA();
		//$NewPizza->getSizeOfPizza();
		$sizeOfPizza = $pizza->getSizeOfPizza();
		echo $sizeOfPizza;
		
        $costForSizeOfPizza = $pizzaOrder->getCostForSizeOfPizza($sizeOfPizza);
        $costForTypeOfCrust = $pizzaOrder->getCostForTypeOfCrust($pizza->getTypeOfCrust());
        $costForToppings = $pizzaOrder->getCostForToppings($pizza->getToppings());

        $subTotalAmount = $pizza->getNumberOfPizza()*($costForSizeOfPizza + $costForTypeOfCrust + $costForToppings);
        echo "costForSizeOfPizza".$costForSizeOfPizza;
        echo "costForTypeOfCrust".$costForTypeOfCrust;
        echo "costForToppings".$costForToppings;
        
        return $subTotalAmount;
        
    }
    
    public function getTotalTax($pizza, $subTotalAmount)
    {
        $pizzaOrder = new PizzaOrder;
        $tax = $pizzaOrder->calculateTax($pizza->getProvince());
        $totalTax = ($tax*$subTotalAmount)/100;
        
        return $totalTax;
    }
    
    public function calculateTax($province)
    {
        $tax=0;
        switch($province)
        {
            case "Ontario":
                $tax = 13;
                break;
            case "Quebec":
                $tax = 10;
                break;
            case "Manitoba":
                $tax = 8;
                break;
            case "Saskatchewan":
                $tax = 5;
                break;
            default :
                $tax = 0;
        }
        return $tax;
    }
    
    function getCostForSizeOfPizza($sizeOfPizza)
    {
        $costForSizeOfPizza = 0;
        switch($sizeOfPizza)
        {
            case "Small":
                $costForSizeOfPizza = 5;
                break;
            case "Medium":
                $costForSizeOfPizza = 10;
                break;
            case "Large":
                $costForSizeOfPizza = 15;
                break;
            case "Extra Large":
                $costForSizeOfPizza = 20;
                break;
            default:
                $costForSizeOfPizza = 0;
        }
        return $costForSizeOfPizza;
    }
    
    public function getCostForTypeOfCrust($crust)
    {
        $costForTypeOfCrust = 0;

        if($crust == "Stuffed crust")
        {
            $costForTypeOfCrust = 2;
        }
        
        return $costForTypeOfCrust;
    }
    
    public function getCostForToppings($toppings)
    {
        $costForToppings = 0;
        if(count($toppings)>1)
        {
            $costForToppings = (count($toppings)-1)/2;
        }
        
        return $costForToppings;
    }
    
    public function writeOrderToFile($fullname, $province, $numberOfPizza, $sizeOfPizza, $crust, $toppings, $totalTax, $totalAmount)
    {
        /*
        $errorInFileWrite = false;
        JSONObject obj = new JSONObject();
        obj.put("Name", fullname);
        obj.put("Province", province);
        obj.put("Number of Pizza", numberOfPizza); 
        obj.put("Size Of Pizza", sizeOfPizza);
        obj.put("Type of Crust", crust);
        obj.put("Total Tax", totalTax);
        obj.put("Total Amount", totalAmount);
        
        JSONArray topping = new JSONArray();
        for(int i=0;i<toppings.length;i++)
        {
            topping.add(toppings[i]);
        }
        
        obj.put("Toppings", topping);
        
        FileWriter file = new FileWriter("/Users/harjot/Documents/OrderList.txt",true);
        try {
            file.write(obj.toJSONString());
            file.write("\n");
            System.out.println("Successfully Copied JSON Object to File...");             
        } catch (IOException e) {
            e.printStackTrace(); 
            errorInFileWrite = true;
        } finally {
            file.flush();
            file.close();
        }
        
        return errorInFileWrite;
        */
    }
}

?>