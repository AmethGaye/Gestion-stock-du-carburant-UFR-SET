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

  const myChart = createChart(null, title = 'Statistiques mensuelles');

  
  document.addEventListener('DOMContentLoaded', ()=> {
    try {
      fetch('/comptable/pourcentage')
      .then(response => response.json())  
      .then(data => {
          setProgress(data.percent)
      });
      getMonths();
    } catch (error) {
      console.log(error)
    }
  });

  // getMonths();


  const Mois = {
    '1' : 'Janvier',
    '2' : 'Février',
    '3' : 'Mars',
    '4' : 'Avril',
    '5' : 'Mai',
    '6' : 'Juin',
    '7' : 'Juillet',
    '8' : 'Aout',
    '9' : 'Septembre',
    '10' : 'Octobre',
    '11' : 'Novembre',
    '12' : 'Decembre'
  }

  function showDailyStat(elem, month){
    elem.parentNode.classList.toggle('hidden');
    document.getElementById('opt-choosen').value = Mois[month];
    getDays(month);
  }

  function showMonthlyStat(elem){
    elem.parentNode.parentNode.classList.toggle('hidden');
    getMonths();
  }



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
          myChart.data = monthlyData;
          myChart.options.plugins.title.text = "Statistiques mensuelles"
          myChart.update();
          
      });
    } catch (error) {
      
    }
  };
  
  



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
          myChart.data = dailyData;
          myChart.options.plugins.title.text = "Statistiques journalières"
          myChart.update();
      });
    } catch (error) {
      
    }
  };

  


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
            },
            scales: {
              y: {
                  beginAtZero: true // Commencer l'axe des ordonnées à zéro
              }
            }
          },
          
      });
      Chart.defaults.font.family = "poppins";
      return myChart;
    } catch (error) {
      
    }
  }

  
  



</script>
<script> 
  window.User = {
      id:{{ auth()->check() ? auth()->user()->id : null }}
  }
</script>

</body>
</html>
