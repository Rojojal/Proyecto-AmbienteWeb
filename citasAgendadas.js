
const ctxCitas = document.getElementById('citasAgendadas').getContext('2d');

const citasAgendadasChart = new Chart(ctxCitas, {
    type: 'bar',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      datasets: [{
        label: '# Numero de citas agendadas por mes',
        data: [29, 19, 45, 25, 32, 34, 26, 17, 21, 31, 30, 25],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false, 
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
});
