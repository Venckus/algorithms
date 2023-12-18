"""
The task is to sort the colors in the order of their numbers.
The given String of colors and the index number in the end.
For example:
"red3 blue1 green2" and the output should be
"blue green red"
"""

def solution(s: str) -> str:
    """_summary_
    The choosen solution is to create a dictionary of colors
    by splitting the string in to list and taking last character
    of each string in list as dictionary key and color name 
    without index number as dictionary value.
    Then create `keys` list from previously filled dictionary
    and sort it. Later iterate `keys` and create new dictionary
    from sorted `keys` and values from previous dictionary.

    Args:
        s (str): String of colors and the index number in the end

    Returns:
        str: sorted string of colors in the order of their index number
    """
    str_dict = {int(color[-1]): color[:-1] for color in s.split(' ')}

    keys = list(key for key in str_dict.keys())
    keys.sort()

    sorted_colors_list = {i: str_dict[i] for i in keys}

    return ' '.join(sorted_colors_list.values())

if __name__ == '__main__':
    s = "red3 blue1 green2"
    print(solution(s))