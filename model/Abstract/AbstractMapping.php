<?php

// Another of Mika's wonderfully reusable chunks of code

// set the namespace so that it can be found :)
namespace model\Abstract;

// Abstract classes can't be instanced but can be extended
abstract class AbstractMapping
{
    public function __construct(array $tab)
    {
        // hydration of child classes
        $this->hydrate($tab);
    }

    protected function hydrate(array $assoc): void
    {
        foreach ($assoc as $key => $value) {
            // create the setter names by...
            $tab = explode("_", $key); // cutting the name wherever _ is found and add to an array
            $majuscule = array_map('ucfirst',$tab); // make each first letter uppercase
            $newNameCamelCase = implode($majuscule); // re-attach the modified array elements
            $methodeName = "set" . $newNameCamelCase; // and add 'set' to the start of the new string

            // now check if the method exists
            if (method_exists($this, $methodeName)) {
                // hydation of located parameter with value
                $this->$methodeName($value);
            }
        }
    }


}