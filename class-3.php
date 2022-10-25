<?php
//css styles
echo "<style>
*{
    box-sizing: border-box;
}
body{
    font-size: 20px; 
    font-family: 'Arial';
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-area: 1fr;
    gap: 1em;
    justify-content: space-around;
    align-items: center;
    line-height: 1.2em;
}
.col-1{
    background: #2E294E;
    height : 100vh;
    width : 100%;
    color: white;
    padding: 2rem;
}
.col-2{
    background: #D6D6B1;
    color: black;
    height : 100vh;
    width : 100%;
    padding: 2rem;
}
</style>";
//css styles ends


    echo "<div class=\"col-1\">";//column 1 for grid layut
#5.1 more from functions
    /**there are so many repetive tasks we have to do in programming
     * functions made that very easy and fun to do.
     * for example:
     */
    
     //the above function simply creates a meal
    function makeMeal($name, $mainDish, $sideDish, $drink){
        echo "$name includes $mainDish, $sideDish & a $drink";
        echo "<br>";
    }
    makeMeal("Breakfast", "🥞", "🥚", "🥛");

    makeMeal("Lunch", "🍗", "🥣", "☕");
    
    //this function will convert celcius into farenheit
    function celToFaren($tempInCelcius) {
        echo "<br/>";
        $c = $tempInCelcius;
        $f = $c*(9/5)+32;
        
        echo "$c ° Celsius is $f ° in Farenheit. <br/>";
    }
    celToFaren(37);
#5.2 default values in parameters
    //we can also define function parameters as optional by giving a default value
    function verifyYourself($answer = "Robot"){
        echo "I am a $answer <br/>";
    }
    verifyYourself();// this will print  as Robot(default value)
    verifyYourself("Human");// this will print as Human
    
#6. Arrays
    /**
     * array is a collection of multiple types of data
     * we can store different types of data in one variable    
     */
    $myArr = ["Student", "College", 21, 5.7, "Chess"];
    /* in the array above we stored string, int &  float in a single variable
    #How do we acces the data? - We can access the whole array using print_r
     Or var_dump() method */
    echo "<pre>";//this html tag used to format the output of print_r & var_dump()
    print_r($myArr);
    echo "<br>";
    var_dump($myArr);
    echo "</pre>";
    
    echo "</div>";//column 1 ends

    echo "<div class=\"col-2\">";//column 2 for grid layut
    /**but to be specific we have to access the data using index
     * index start with 0 and continue respectively(see output of print_r($myArr)
     */ 
    echo "$myArr[0] <br>";//prints the first item of myArr array
    echo "I am a $myArr[1] $myArr[0]. <br>
         I am $myArr[2] years old. I am $myArr[3] in height & I like to play $myArr[4] <br>";
   
#7. Conditional statements or if-else statements
     /** the if else statement works in a simple manner
      * they have to block of code. The code inside if block
      * executes when the defined condition is true & 
      * the inside else block executes when the condition is false */
      if(true){//try changing the condition into false to execute else block(use not oparetor: '!')
        echo "Condition is true✅. So executing the if block <br>";
      }else{
        echo "Make the condition false❌ to execute else block<br>";
      }

#7.1 Conditional Operators
    /** 
     * == : equal (checks if both operends are equal or not)
     * != : not equal (checks if both operends are not equal or equal)
     * === : identical (checks if both operends are identical-(smae vale & same type))
     * && : logical AND (add another condition if either of the condition is false then returns false)
     * || : logical OR (add another condition if either of the condition is true then returns true)
     * ! : logical NOT (makes a true condition false & vice versa)
     */
    $pet = "🐈";
    $says = "meow";
    $paws = "🐾";
    $drink = "🥛";

    if ($paws == "🐾" && $drink == "🥛"){//changing any condition will returns false
        echo "It's a $pet <br>";
    }else{
        echo "Sorry it's not a $pet. We need a $pet<br>";
    }

    if ($pet == "🐈" || $says = "meow") {
        # code...
        echo "Hey, It's a $pet. <br> Says $says. <br> Drinks $drink. <br> And it has $paws<br>";
    }
#7.2 Ternary Operators
    //Syntax: echo condition ? "code for true" : "code for false";
    // this is a method used for short if else statements to make the code much more readable
    $planet = "Earth";
    $star = "Sun";
    
    echo ($planet == "Earth" || $star) == "Sun" ? "It's our Solar System 🌞 <br>" : "It's not our Solar System ☹ <br>";
    
    
    function isLeapYear($year){
        echo ($year%4 == 0) ? "$year is a leap year<br>" : "$year is not a leap year<br>"; 
    }
    isLeapYear(2002);//its not a leap year
    isLeapYear(2020);//it is
//making a simple functions to convert days or hours into seconds
    function dayToSeconds($day){
        echo "<br/>";
        $seconds = $day * 24 * 60 * 60;
        echo "$day days  is equal to $seconds seconds<br>";
    }
    //a simple function to convert USD to BDT;
    function usdToBDT($usd){
        echo "<br/>";
        $bdt = $usd * 100;
        $usd = number_format($usd, 2);
        $bdt = number_format($bdt, 2);
        echo "$ $usd USD is equal to $bdt in BDT";
    }

    //use cases of ternary operators
    //a simpl function  to convert anything into anything
    function convert(string $from, string $to, int $amount = 1){
        $from = strtolower($from);
        $to = strtolower($to);
        echo ($from == "celcius" && $to == "farenheit") ? celToFaren($amount): "";//using a previosly created celToFaren function
        echo ($from == "day" && $to == "second") ? dayToSeconds($amount) : "";
        echo ($from == "usd" && $to == "bdt") ? usdToBDT($amount): "";
    }
    convert("Celcius", "Farenheit", 32);
    convert("day", "second", 2);
    convert("USD", "BDT", 800);
    
    echo "<div>";//column 2 ends
