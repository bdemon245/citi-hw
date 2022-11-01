<?php
//basic css
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
//basic css

echo "<div class=\"col-1\">";//column 1
#8. types of array
/**
 * Indexing Array ==> Datas are referenced by there default index numbers
 * Associative Array ==> Datas are referenced by there given index names
 * Multidimensional Array ==> It's basically one or multiple arrays inside another array
 */
    #8.1 Indexing Array
    $pcSpec = ["ASUS", "Core i3", "6th", "8GB", "256GB SSD", 15.5];
    echo "<pre>";
    print_r($pcSpec);
    echo "</pre>";
    //becase there are no defined index we can use default index to access the values
    echo "My laptop brand is $pcSpec[0]<br>";

    //but when our project will go more and more complex working with indexing array becomes confusing

    #8.2 Associative Array Solves the Problem avobe
    $pc = [
        'brand' => "ASUS",
        'cpu' => "Core i3",
        'gen' => "6th",
        'ram' => "8GB",
        'storage' => "256GB SSD",
        'Display' => 15.5
    ];
    echo "My laptop has a CPU of " . $pc['cpu']."<br>";//now we don't have to worry about order of index

    #8.3 Multidimensional Array
    $pet = [
        'cat' =>[
            'face' => "😸",
            'says' => "meow",
            'loves' => "🐟"
        ],
        'dog' =>[
            'face' => "🐶",
            'says' => "woof",
            'loves' => "🍗"
        ],
        'bunny' =>[
            'face' => "🐰",
            'says' => "kuwak-kuku",
            'loves' => "🥕"
        ]
        ];
    // echo "This is a $pet[\"cat\"]" #we can't use echo like this even if we escape the double quotes inside the brackets
    echo "Cat says " .$pet['cat']['says'] . ", Give me some ". $pet['cat']['loves']. ".<br>";//this works but seems messy
    printf("Bunny says %s, Give me some %s. <br>",$pet['bunny']['says'], $pet['bunny']['loves']);//we can use printf() for a organized approach

#9. Scoping
    //like every other language php has 2 types of scoping
    /*
    #9.1 Global scoping ==> variable that are declared anywhere can be called a global scope
    unless it's inside a function & global variables can't be accessed directly inside a function
    */
        $global_variable = "Hey its a global variable🌍.<br>";
        
        echo $global_variable;
        echo "cant be accessed directly inside a function<br>";
        function cantAccessGlob()
        {
            // echo "this will cause an error $global_variable";#uncomment this line to see the error
        }
        // cantAccessGlob();#uncomment this line to see the error
        function canAccessGlob($param)
        {
            echo "But can be accessed as a Parameter => $param";
        }
        canAccessGlob($global_variable);

        //we can also use a global_variable inside a function using global keyword
        function canAccessGlob2()
        {
            global $global_variable;
            echo "We can also access it with the 'global' keyword => $global_variable <br>";
        }
        canAccessGlob2();
    /** 
    #9.2 local scoping ==> variable declared inside a function can be called local scope
    or local variable, we can't use local variable outside it's scope
     */
    function localVariable()
    {
        $local = "its a local variable🗾<br>";
        echo "Local variable can only be used in its Scope => $local <br>";
    }
    localVariable();
    // echo "$local";#uncomment this line to see the error
   
echo "</div>";



echo "<div class=\"col-2\">";//column 2
  
    /** 
    #9.3 Static scoping ==> static is a way of initializing local variables so that they can have
    a memory to store the last value of that variable to use it next time  */
        function addNum($num)
        {
            static $default = 100;//remove the static keyword to see how the  value changes.
            echo "Add $default ";
            $default += $num;
            echo "with $num and get $default<br>";
        }
        addNum(100);
        addNum(300);
        addNum(500);
    /**
     * #10. String Methods
     * strtoupper()==> used for capitaliation
     * strtolower()==> used for capitaliation
     * ucwords()==> used for capitaliation
     * strrev()==> reverse the characters in a string
     * strpos()==> returns the position of a chracter in a string
     * stripos()==> returns the position of a chracter in a string(case insensetive)
     * substr()==> removes specified number of characters from the beginning in a string(index wise) 
     * str_replace()==> finds & replaces something from a string
     * trim()==> trim anything from a string
     * implode(), join()==> joins multiple string elements together
     * md5 sha1 ==>calculates a string into a hash for encryption purpose
     * strlen() ==> returns the length of a string
     * */
    $str = "This is a string🧵<br>";
    echo strtoupper($str); 
    echo strtolower($str);
    echo ucwords($str);
    echo strrev($str);
    echo "<br>";
    echo strpos($str, 'string')."<br>";
    echo strpos($str, 'String')."<br>";//case is not mathced so it will return nothing
    echo stripos($str, 'StRing') ."<br>";//this method is case insensetive so will return the position
    echo substr($str,10)."<br>";//removes the first 10 characters(0-9)
    echo str_replace("string🧵", "Car🚗", $str);
    echo trim($str, "This is ");

    $pass = 123456;
    $encrypted_hash = password_hash($pass, PASSWORD_BCRYPT);
    echo $encrypted_hash."<br>";
    var_dump(password_verify(123456,$encrypted_hash)) ;

    
echo "</div>";