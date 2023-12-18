# Sort color by given key
The task is to sort the colors in the order of their numbers.
The given String of colors and the index number in the end.
For example:
"red3 blue1 green2" and the output should be
"blue green red"

## Python solution
The choosen solution is to create a dictionary of colors
by splitting the string in to list and taking last character
of each string in list as dictionary key and color name 
without index number as dictionary value.
Then create `keys` list from previously filled dictionary
and sort it. Later iterate `keys` and create new dictionary
from sorted `keys` and values from previous dictionary and
join into new string. Return new string.

# GoLang solution
The choosen solution is to create a dictionary of colors
by splitting the string in to list and taking last character
of each string in list as dictionary key and color name 
without index number as dictionary value.
Then iterate indexes by taking list of strings as range and
concatenate into new string. Return new string.

# PHP solution
The choosen solution is to create an array of strings by exploding the string.
Create new empty array for key value pairs.
Then iterate that strings array and fill keys using `mb_substr` to take last character and values by using `mb_substr` to get value without last character which is key number.
Later use `ksort` to sort new array by keys and `implode` to create solution string. Return that string.
