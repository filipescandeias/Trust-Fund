document.addEventListener("DOMContentLoaded", function () {
    function checkWidth() {
      if (window.innerWidth < 991) {
        var offcanvas = document.querySelector(".offcanvas");
        if (offcanvas.classList.contains("show")) {
          var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvas);
          offcanvasInstance.hide();
        }
      }
    }
  
    // Check width on page load
    checkWidth();
  
    // Add event listener for window resize
    window.addEventListener("resize", checkWidth);
  });  

  function changePage(page) {
    // Atualiza a URL sem recarregar a página
    history.pushState(null, '', '?page=' + page);
    
    // Carrega o conteúdo correspondente
    loadContent(page);
}

function loadContent(page) {
    // Faz uma requisição para carregar o conteúdo da página dinamicamente
    const contentDiv = document.querySelector('.content');
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '?page=' + page, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            contentDiv.innerHTML = xhr.responseText;
        } else {
            contentDiv.innerHTML = "<h1>Erro ao carregar a página</h1>";
        }
    };
    xhr.send();
}

window.addEventListener("load", () => {
  // Adiciona o evento de clique aos itens do dropdown
  document.querySelectorAll(".dropdown-item").forEach((item) => {
    item.addEventListener("click", () => {
      // Remove a classe 'active' de todos os nav-links
      document.querySelectorAll(".nav-link").forEach((navLink) => {
        navLink.classList.remove("active");
      });
    });
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
});
=======
});  
>>>>>>> ee25f13 (Dropdown a funcionar)
=======
});  

>>>>>>> 00c56b1 (Detalhe da Conta apontando os gastos em gráficos)
=======
=======
  });
>>>>>>> b588f8c (Grande Milestone)
});

// Renderizar o gráfico
const ctx = document.getElementById("chartMovimentos").getContext("2d");
const chartMovimentos = new Chart(ctx, config);

// Função para atualizar o total gasto
function updateTotalGasto() {
  const total = data.datasets[0].data.reduce((acc, curr) => acc + curr, 0);
  document.getElementById(
    "total_gasto"
  ).innerText = `Total Gasto: ${total.toFixed(2)}€`;
}

updateTotalGasto();

//Função para exibir o histórico de transações
function displayTransactionHistory() {
  const transactionList = document.getElementById("transactionList");
  transactionList.innerHTML = "";

  transactions.forEach((transaction) => {
    const transactionItem = document.createElement("div");
    transactionItem.className = "transaction-item";
    transactionItem.innerHTML = `
                <strong>Categoria:</strong> ${transaction.category}<br>
                <strong>Gasto em ${
                  transaction.date
                }:</strong> $${transaction.amount.toFixed(2)}
            `;
<<<<<<< HEAD
        transactionList.appendChild(transactionItem);
    })
<<<<<<< HEAD
}

<<<<<<< HEAD
    editBtn.addEventListener('click', function () {
        isEditing = !isEditing;

        amounts.forEach(amount => {
            amount.contentEditable = isEditing;
            if (isEditing) {
                amount.style.backgroundColor = '#fff3cd';
                amount.style.padding = '2px 5px';
                amount.style.borderRadius = '3px';
                amount.style.border = '1px solid #ffeeba';
            } else {
                amount.style.backgroundColor = '';
                amount.style.padding = '';
                amount.style.borderRadius = '';
                amount.style.border = '';
            }
        });

        editBtn.textContent = isEditing ? 'Cancelar' : 'Editar';
        saveBtn.classList.toggle('visible');

        if (!isEditing) {
            // Volta aos valores iniciais se cancelado
            amounts.forEach(amount => {
                amount.textContent = amount.dataset.original;
            });
        }
    });

    saveBtn.addEventListener('click', function () {
        isEditing = false;

        // Envio de dados atualizados para o backend PHP
        amounts.forEach(amount => {
            amount.contentEditable = false;
            amount.dataset.original = amount.textContent;
            amount.style.backgroundColor = '';
            amount.style.padding = '';
            amount.style.borderRadius = '';
            amount.style.border = '';
        });

        editBtn.textContent = 'Editar';
        saveBtn.classList.remove('visible');

        // Exemplo de coleta de dados sendo mandados para o backend
        const updatedData = {};
        amounts.forEach((amount, index) => {
            const label = amount.parentElement.querySelector('.expense-label').textContent.slice(0, -1);
            updatedData[label] = amount.textContent;
        });

        console.log('Data to be saved:', updatedData);
        // Usa-se o AJAX par salvar os dados
    });
});

//Calendário:

document.addEventListener('DOMContentLoaded', function () {
    function updateDateTime() {
        const calendarElement = document.getElementById('calendar');
        const now = new Date();
        const day = now.getDate().toString().padStart(2, '0');
        const month = now.toLocaleString('pt-PT', { month: 'long' });
        const year = now.getFullYear();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        calendarElement.textContent = `${day} de ${month} de ${year} - ${hours}:${minutes}:${seconds}`;
    }
    updateDateTime();
    setInterval(updateDateTime, 1000); // Atualiza a cada segundo
});
<<<<<<< HEAD
>>>>>>> 2bfddfe (Página objetivos corrijida e atualizada)
=======

setTimeout(function() {
    var alert = document.getElementById('alertMessage');
    alert.style.display = 'none';
}, 5000);
>>>>>>> 313837c (Começo de colocação de php nas páginas)
=======
>>>>>>> e7bd6dc (Php de movimentos e objetivos)
=======
}
>>>>>>> 6f9c6c2 (Juntar tudo)
=======
    transactionList.appendChild(transactionItem);
  });
}
>>>>>>> b588f8c (Grande Milestone)
