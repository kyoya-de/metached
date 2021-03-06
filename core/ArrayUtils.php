<?php
/**
 * This piece of software is released under the MIT license. Take a look at the LICENSE file.
 *
 * Feel free to copy and change the code, but never remove the original author! Pull requests are also welcome.
 *
 * @version 1.0.0
 * @author  Stefan Krenz <krenz.stefan@googlemail.com>
 */

class ArrayUtils
{
    public static function mergeSort(&$array, $compareFunction = 'strcmp')
    {
        // Arrays of size < 2 require no action.
        if (count($array) < 2) {
            return;
        }
        // Split the array in half
        $halfway = count($array) / 2;
        $array1  = array_slice($array, 0, $halfway);
        $array2  = array_slice($array, $halfway);
        // Recurse to sort the two halves
        self::mergeSort($array1, $compareFunction);
        self::mergeSort($array2, $compareFunction);
        // If all of $array1 is <= all of $array2, just append them.
        if ($compareFunction(end($array1), $array2[0]) < 1) {
            $array = array_merge($array1, $array2);

            return;
        }
        // Merge the two sorted arrays into a single sorted array
        $array = [];
        $ptr1  = $ptr2 = 0;
        while ($ptr1 < count($array1) && $ptr2 < count($array2)) {
            if ($compareFunction($array1[$ptr1], $array2[$ptr2]) < 1) {
                $array[] = $array1[$ptr1++];
            } else {
                $array[] = $array2[$ptr2++];
            }
        }

        // Merge the remainder
        while ($ptr1 < count($array1)) {
            $array[] = $array1[$ptr1++];
        }
        while ($ptr2 < count($array2)) {
            $array[] = $array2[$ptr2++];
        }
    }
}
