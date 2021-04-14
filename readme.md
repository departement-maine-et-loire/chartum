#Chartum

Chartum is a Typo3 extension to show your data as charts like Pie, Doughnut, Bar, Line or Radar. 


##How to install it ?

-Download the extension on https://extensions.typo3.org. 
-Unzip the extension folder on your typo3 directory.
-Activate the extension in the typo3 backend.


##How to use it ?

-In Selected Plugin select "Visuel Graphique [chartum_visuelgraph]".
-Add directory path to add a csv.

    The csv file must look like this: 

       |      | Labels1 | Labels2 | Labels3 |         |        |
       |------|---------|---------|---------|---------|--------|
       |Label1|   xx    |   xx    |   xx    |  #color | opacity|
       |Label2|   xx    |   xx    |   xx    |  #color | opacity| 
       |Label3|   xx    |   xx    |   xx    |  #color | opacity|

        Color settings:

        You must write your color in hexadecimal.


        Opacity settings:

        For Opacity you must use a number between 0 and 100. For full opacity select the lowest value. For minimum opacity select the highest value.
                                         

-Add title to your chart.
-Select your type of chart.


##Technical stack:

-ChartJS 3.0.2
-PHP 7.4
-Typo3 9.5




