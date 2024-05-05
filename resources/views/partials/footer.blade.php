<script src="{{ asset('js/app.js') }}"></script>
@if(session('success'))
<script>
    showMessage(`{{ session('success') }}`, 'success');
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Données factices pour illustrer l'exemple
    function setProgress(parcent) {
      try {
        let progressCircle = document.querySelector('.progress');
        let radius = progressCircle.r.baseVal.value;
        let circumference = radius * 2 * Math.PI;
        progressCircle.style.strokeDasharray = circumference;
        progressCircle.style.strokeDashoffset = circumference * (1 - parcent / 100);
        document.querySelector('#percent').innerHTML = `${parcent} %`;
      } catch (error) {
        
      }
    }


  document.addEventListener('DOMContentLoaded', ()=> {
    try {
      fetch('/comptable/pourcentage')
      .then(response => response.json())  
      .then(data => {
          setProgress(data.percent)
      });
    } catch (error) {
      console.log(error)
    }
  });

  const getMonths = ()=>{
    try {
      fetch('/monthlyData')
      .then(response => response.json())
      .then(data => {
          const monthlyData = {
            labels: Object.keys(data),
            datasets: [{
                label: 'Nombre de tickets sortants',
                data: Object.values(data),
                fill: true,
                borderColor: 'rgba(34, 197, 94, 0.65)',
                backgroundColor: "rgba(22, 163, 74, .2)",
                borderWidth: 4,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#4ade80',
                pointBorderColor: 'rgba(187, 247, 208, 1)',
                pointBorderWidth: 3
            }],
          };

          // Créer le graphique
          createChart(monthlyData);
          
      });
    } catch (error) {
      
    }
  };
  
  // getMonths();


  // var data1 = {
  //           label: 'Courbe 1',
  //           data: [10, 20, 30, 40, 50, 60], // Exemple de données
  //           borderColor: 'rgba(255, 99, 132, 1)',
  //           backgroundColor: 'rgba(255, 99, 132, 0.2)',
  //           fill: false
  //       };

  //       // Données pour la deuxième courbe
  //       var data2 = {
  //           label: 'Courbe 2',
  //           data: [20, 30, 40, 50, 60, 70], // Exemple de données
  //           borderColor: 'rgba(54, 162, 235, 1)',
  //           backgroundColor: 'rgba(54, 162, 235, 0.2)',
  //           fill: false
  //       };

  //       // Créer le graphique
  //       var ctx = document.getElementById('myChart').getContext('2d');
  //       var myChart = new Chart(ctx, {
  //           type: 'line',
  //           data: {
  //               labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin'], // Exemple de labels de l'axe x
  //               datasets: [data1, data2] // Ajouter les deux ensembles de données
  //           },
  //           options: {
  //               scales: {
  //                   y: {
  //                       beginAtZero: true
  //                   }
  //               }
  //           }
  //       });

  const getDays = (month)=>{
    try {
      fetch(`/dailyData/${month}`)
      .then(response => response.json())
      .then(data => {
          const dailyData = {
            labels: Object.keys(data),
            datasets: [{
                label: 'Nombre de tickets sortants',
                data: Object.values(data),
                fill: true,
                borderColor: 'rgba(34, 197, 94, 0.65)',
                backgroundColor: "rgba(22, 163, 74, .2)",
                borderWidth: 4,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#4ade80',
                pointBorderColor: 'rgba(187, 247, 208, 1)',
                pointBorderWidth: 3
            }],
          };

          // Créer le graphique
          createChart(dailyData, 'Statistiques journalières');
      });
    } catch (error) {
      
    }
  };

  getDays(5);
  


  // let currentData = monthlyData; // Initialiser avec les données mensuelles par défaut
  

  function createChart(data, title = 'Statistiques mensuelles'){
    try {
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
          type: 'line',
          data: data,
          options: {
            plugins: {
              legend : {
                display : false,
                labels: {
                  font: {
                    size: 14,
                    weight: '500'
                  }
                }

              },
              title: {
                display : true,
                text : title,
                font: {
                  size: 18,
                  weight: '500',

                },
                position: 'bottom',
                padding: {
                  top: 30
                }
              }
            }
          },
          
      });
      Chart.defaults.font.family = "poppins";
    } catch (error) {
      
    }
  }
  


  // Fonction pour afficher les statistiques mensuelles
  async function showMonthlyStats() {
      myChart.data = monthlyData;
      myChart.update();
  }

  // Fonction pour afficher les statistiques journalières
  function showDailyStats() {
      myChart.data = dailyData;
      myChart.update();
  }


</script>
<script> 
  window.User = {
      id:{{ auth()->check() ? auth()->user()->id : null }}
  }
</script>

</body>
</html>
