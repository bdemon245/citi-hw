<?php
//Topics to be known
    #1. Using HTML in PHP
    //we can use any valid HTML element & inline  css in php using strings
    $title = "<body style=\"background: darkgray; font-size: 24px;\">
                <h1 style=\"color: gray;\">This can be a website's name</h1><br/>
            </body>";
    echo $title;//prints the title in red

    #2. string related methods
    //this string related methods can be useful when capitalizing
    echo strtoupper($title);//print title in upper case
    echo strtolower($title);//print title in lower case
    
    #3. printing methods
    /*while printing with echo is what we usually want do
    we can also use print_r() & var_dump() to get some extra information */
    var_dump("This will be printed with its type");
    echo "<br>";
    print_r("This will be printed with additional information(if have any)");
    echo "<br>";

    #4. type casting
    // we can change the type of a variable into anything; this is called type casting

    $age = 25;
    var_dump($age);//prints int(25)
    echo "<br>";
    $age = (string)25;
    var_dump($age);//prints string(2)"25"
    echo "<br>";

    #5.functions
    /* functions are basically a block of code that stores the code and 
       gets executed when its invoked(called)*/

       #a. base structure of a function
        function myFucntion() {
        //code goes here
        echo "Executing myFucntion...";
        echo "<br>";
        }
        /*after defining a function we have to call it by its name(myFucntion in this case)
        in order to execute the code inside of that function*/
        myFucntion();//prints the string inside the function

        #b. parameters & arguments
        function addressOf($name){
            echo "$name lives in Bangladesh";
            echo "<br>";
        }
        addressOf('Sakib');//prints: Sakib lives in Bangladesh
        /**parameters are some empty variables that are used to pass values 
         * later when calling the function & the values we pass are called
         * arguments.
         * Like in the addressOf() function we used a parameter $name which
         * is referenced inside the function;
         * When we called the function we must pass the argument;  
         * */
        #we can use as many parameters as we want, we can also specify their
        #type to avoid any unnecessary uncaught type errors.

        
        
?>