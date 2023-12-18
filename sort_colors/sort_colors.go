package main

import (
	"fmt"
	"strings"
	"strconv"
)

func sortColors(colors string) string {
	var newStr string
	dict := map[int]string{}
    var colorsList []string
    colorsList = strings.Split(colors, " ")

	for _, color := range colorsList {
		i, err := strconv.Atoi(color[len(color)-1:])
		if err != nil {
			fmt.Println(err)
		}
		dict[i] = color[:len(color)-1]
	}

	for i := 1; i <= len(colorsList); i++ {
		newStr += dict[i]
		if i < len(colorsList) {
			newStr += " "
		}
	}

	return newStr
}

func main() {
	var colors string
    colors = "red3 blue1 green2"
	fmt.Println(sortColors(colors))
}