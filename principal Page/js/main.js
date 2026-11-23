// Agregar un desplazamiento suave al hacer clic en un enlace de ancla
document.querySelectorAll(".isotope-filters li").forEach(function (filters) {
  filters.addEventListener(
    "click",
    function () {
      // Cambiar el filtro activo
      let activeFilter = document.querySelector(
        ".isotope-filters .filter-active"
      );
      if (activeFilter) {
        activeFilter.classList.remove("filter-active");
      }
      this.classList.add("filter-active");

      // Aplicar el filtro a Isotope
      if (typeof initIsotope !== "undefined" && initIsotope.arrange) {
        initIsotope.arrange({
          filter: this.getAttribute("data-filter"),
        });
<<<<<<< HEAD
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
=======
>>>>>>> 78c5d11 (thomaz precisa eu dou)
      }

      // Iniciar animación AOS si existe
      if (typeof aosInit === "function") {
        aosInit();
      }
    },
    false
  );
});

/**
 * Frequently Asked Questions Toggle
 */
document.querySelectorAll(".faq-item").forEach((faqItem) => {
  const toggleButton = faqItem.querySelector(".faq-toggle"); // Selecciona el botón de la flecha
  if (toggleButton) {
    toggleButton.addEventListener("click", () => {
      // Alterna la clase 'faq-active' en el FAQ clicado
      faqItem.classList.toggle("faq-active");
    });
  }
<<<<<<< HEAD
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();
=======
});

/**
 * Correct scrolling position upon page load for URLs containing hash links.
 */
window.addEventListener("load", function () {
  if (window.location.hash) {
    let targetSection = document.querySelector(window.location.hash);
    if (targetSection) {
      setTimeout(() => {
        let scrollMarginTop =
          getComputedStyle(targetSection).scrollMarginTop || 0;
        window.scrollTo({
          top: targetSection.offsetTop - parseInt(scrollMarginTop),
          behavior: "smooth",
        });
      }, 100);
    }
  }
});

/**
 * Navmenu Scrollspy
 */
let navmenulinks = document.querySelectorAll(".navmenu a");

function navmenuScrollspy() {
  navmenulinks.forEach((navmenulink) => {
    if (!navmenulink.hash) return;
    let section = document.querySelector(navmenulink.hash);
    if (!section) return;
    let position = window.scrollY + 200;
    if (
      position >= section.offsetTop &&
      position <= section.offsetTop + section.offsetHeight
    ) {
      document
        .querySelectorAll(".navmenu a.active")
        .forEach((link) => link.classList.remove("active"));
      navmenulink.classList.add("active");
    } else {
      navmenulink.classList.remove("active");
    }
  });
}

// Añadir evento scroll para Scrollspy
window.addEventListener("scroll", navmenuScrollspy);

// Cambiar el tamaño de la topbar cuando se hace scroll
window.addEventListener("scroll", function () {
  const topBar = document.querySelector(".top-bar");
  if (topBar) {
    if (window.scrollY > 50) {
      topBar.classList.add("shrink");
    } else {
      topBar.classList.remove("shrink");
    }
  }
});

// Animación en el formulario de login
var current = null;
function animatePath(
  targetElement,
  strokeDashoffsetValue,
  strokeDasharrayValue
) {
  if (current) current.pause();
  current = anime({
    targets: targetElement,
    strokeDashoffset: {
      value: strokeDashoffsetValue,
      duration: 700,
      easing: "easeOutQuart",
    },
    strokeDasharray: {
      value: strokeDasharrayValue,
      duration: 700,
      easing: "easeOutQuart",
    },
  });
}

document.querySelector("#email").addEventListener("focus", function () {
  animatePath("path", 0, "240 1386");
});

document.querySelector("#password").addEventListener("focus", function () {
  animatePath("path", -336, "240 1386");
});

document.querySelector("#submit").addEventListener("focus", function () {
  animatePath("path", -730, "530 1386");
});

// Validación del formulario de login
const loginForm = document.getElementById("loginForm");
const emailInput = document.getElementById("email");
const emailError = document.getElementById("emailError");

loginForm.addEventListener("submit", function (event) {
  if (!emailInput.checkValidity()) {
    event.preventDefault();
    emailError.style.display = "block";
  } else {
    emailError.style.display = "none";
  }
});
<<<<<<< HEAD
>>>>>>> 78c5d11 (thomaz precisa eu dou)
=======


document.getElementById("registrationForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Evita o envio do formulário

  let isValid = true;

  // Verifica se os campos obrigatórios estão preenchidos
  if (document.getElementById("form3Example1").value === "") {
      document.getElementById("errorFirstName").style.display = "block";
      document.getElementById("form3Example1").classList.add("error");
      isValid = false;
  } else {
      document.getElementById("errorFirstName").style.display = "none";
      document.getElementById("form3Example1").classList.remove("error");
  }

  if (document.getElementById("form3Example2").value === "") {
      document.getElementById("errorLastName").style.display = "block";
      document.getElementById("form3Example2").classList.add("error");
      isValid = false;
  } else {
      document.getElementById("errorLastName").style.display = "none";
      document.getElementById("form3Example2").classList.remove("error");
  }

  if (document.getElementById("form3Example3").value === "") {
      document.getElementById("errorEmail").style.display = "block";
      document.getElementById("form3Example3").classList.add("error");
      isValid = false;
  } else {
      document.getElementById("errorEmail").style.display = "none";
      document.getElementById("form3Example3").classList.remove("error");
  }

  if (document.getElementById("form3Example4").value === "") {
      document.getElementById("errorPassword").style.display = "block";
      document.getElementById("form3Example4").classList.add("error");
      isValid = false;
  } else {
      document.getElementById("errorPassword").style.display = "none";
      document.getElementById("form3Example4").classList.remove("error");
  }

  if (!document.getElementById("form2Example33").checked) {
      document.getElementById("errorTerms").style.display = "block";
      document.getElementById("form2Example33").classList.add("error");
      isValid = false;
  } else {
      document.getElementById("errorTerms").style.display = "none";
      document.getElementById("form2Example33").classList.remove("error");
  }

  // Se tudo estiver correto, envia o formulário
  if (isValid) {
      this.submit(); // Envia o formulário
  }
});

>>>>>>> 9833732 (Pagina de Login finalizada)
