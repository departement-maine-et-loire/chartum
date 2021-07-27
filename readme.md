# Chartum

Chartum is a Typo3 extension to show your data as charts like Pie, Doughnut, Bar, Line or Radar. 

## How to install it ?

- Download the extension on https://extensions.typo3.org 
- Unzip the extension folder on your typo3 directory
- Activate the extension in the typo3 backend

## CSV file nomenclature
**NB: *CSV* file separated by comma and only comma and UTF-8 encoding**

The *csv* file must look like this for line, bar or radar chart: 

    |       | January | February |  March  |         |        |
    |-------|---------|----------|---------|---------|--------|
    |legend1|   xx    |    xx    |    xx   |  #color | opacity|
    |Legend2|   xx    |    xx    |    xx   |  #color | opacity|
    |Legend3|   xx    |    xx    |    xx   |  #color | opacity|

The *csv* file must look like this for pie or doughnut chart:

    |       |      |      |       |
    |-------|------|------|-------|
    |Legend1|  xx  |#color|opacity|
    |Legend2|  xx  |#color|opacity|
    |Legend3|  xx  |#color|opacity|

**Color settings:** hexadecimal (#ffffff) 6 values.

**Opacity settings:** number between 0 and 100
- full transparency: low value
- full opacity: high value.

## How to use it ?

- Add *csv* into *fileadmin* tree
- In Selected Plugin select "Visuel Graphique"
- Add the directory path of your *csv* file in the typo3 backend
- Add legend to your chart in the *RTE area*
- Select your type of chart (Bar, Doughnut, Line, Pie or Radar)
- Save and view your webpage

## Technical stack

- [ChartJS](https://www.chartjs.org/) 3.0.2
- PHP 7.4
- Typo3 9.5