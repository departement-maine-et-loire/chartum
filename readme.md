# Chartum

Chartum is a Typo3 extension to show your data as charts like Pie, Doughnut, Bar, Line or Radar. 


## How to install it ?

-Download the extension on https://extensions.typo3.org. 
-Unzip the extension folder on your typo3 directory.
-Activate the extension in the typo3 backend.


## How to use it ?

-In Selected Plugin select "Visuel Graphique [chartum_visuelgraph]".
-Add .csv file separated by comma and only comma in your fileadmin/user_upload folder.

    The csv file must look like this for line, bar or radar chart: 

       |       | January | Fabrery |  March  |         |        |
       |-------|---------|---------|---------|---------|--------|
       |legend1|   xx    |   xx    |   xx    |  #color | opacity|
       |Legend2|   xx    |   xx    |   xx    |  #color | opacity| 
       |Legend3|   xx    |   xx    |   xx    |  #color | opacity|

    The csv file must look like this for pie or doughnut chart: 

        |       |      |      |       |
        |-------|------|------|-------|
        |Legend1|  xx  |#color|opacity|
        |Legend2|  xx  |#color|opacity|
        |Legend3|  xx  |#color|opacity|

        Color settings:

        You must write your color in hexadecimal.


        Opacity settings:

        For opacity you must use a number between 10 and 99. For full opacity select the lowest value. For minimum opacity select the highest value.
                                         
-Add the directory path of your .csv file in the typo3 backend.
-Add legend to your chart in the rte area.
-Select your type of chart.
-Save and view your webpage.


## Technical stack:

-ChartJS 3.0.2
-PHP 7.4
-Typo3 9.5