   <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data =  google.visualization.arrayToDataTable([
      
    
          ['AD', 'AD'],
         <?php     $departmanlarcek = $db -> prepare("select * from personeller");
                    $departmanlarcek->execute();

                    while ($departmanlarsor = $departmanlarcek -> fetch(PDO::FETCH_ASSOC)){  

                        echo "['".$departmanlarsor['personel_ad_soyad']."',".$departmanlarsor['personel_id']."],";

                    }?>

        ]);

        // Set chart options
        var options = {'title':'DEPARTMAN PERSONEL İSTATİSTİKLERİ',
                       'width':700,
                       'height':450,
                       'is3D':true,
                     };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>