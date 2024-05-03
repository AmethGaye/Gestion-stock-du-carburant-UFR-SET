<script src="{{ asset('js/app.js') }}" defer>
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Données factices pour illustrer l'exemple

  const data = getData();
  console.log(data);

  const monthlyData = {
      labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
      datasets: [{
          label: 'Nombre de tickets sortants',
          data: [1000, 800, 150, 300, 250, 400, 350, 500, 450, 800, 550, 700],
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

  const dailyData = {
      labels: Array.from({length: 31}, (_, i) => (i + 1).toString()), // Jours du mois
      datasets: [{
          label: 'Nombre de tickets sortants',
          data: Array.from({length: 31}, () => Math.floor(Math.random() * 100)), // Données aléatoires
          fill: true,
          borderColor: 'rgba(34, 197, 94, 0.65)',
          backgroundColor: "rgba(22, 163, 74, .2)",
          borderWidth: 3,
          tension: 0.4,
          pointRadius: 4,
          pointBackgroundColor: '#4ade80',
          pointBorderColor: 'rgba(187, 247, 208, 1)',
          pointBorderWidth: 1
      }]
  };

  let currentData = monthlyData; // Initialiser avec les données mensuelles par défaut
  
  Chart.defaults.font.family = "poppins";

  // Créer le graphique
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'line',
      data: currentData,
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
            text : "Statistiques mensuelles",
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

  async function getData(){
    try {
        let response = await fetch('/stats');
        const result = await response.json();
        // const result = await response.text();
        console.log(result)
      return result;
    } catch (error) {
      console.log(error)
    }
  }
</script>
</body>
</html>
