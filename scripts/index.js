document.addEventListener("DOMContentLoaded", function () {
  const openButton = document.getElementById("open-menu-button");
  const closeButton = document.getElementById("close-menu-button");
  const backdropFilter = document.getElementById("backdrop-filter");
  const sidebarMenu = document.getElementById("sidebar-menu");
  const sections = document.querySelectorAll(".section-wrapper");
  const navbar = document.getElementById("navbar");
  const goToFirstSection = document.getElementById("goToFirstSection");
  const sidebarLinks = document.querySelectorAll(".sidebar-link");

  let scrollTimer = null;
  let sidebarIsOpen = false;

  sidebarLinks.forEach((link) => {
    link.addEventListener('click', function (e) {
      setTimeout(() => {
        this.classList.toggle("active");
      }, 100);
    })
  });

  function updateActiveLink(currentIndex) {
    sidebarLinks.forEach((link, index) => {
      link.classList.toggle("active", index + 1 === currentIndex);
    });
  }

  function getCurrentIndex() {
    return Array.from(sections).findIndex((section) => {
      const rect = section.getBoundingClientRect();
      return (
        rect.top <= window.innerHeight / 2 &&
        rect.bottom >= window.innerHeight / 2
      );
    });
  }

  function scrollToSection(targetIndex) {
    const targetSection = sections[targetIndex];
    const targetId = targetSection.getAttribute("id");

    navbar.classList.toggle("navbar-hide", targetId === "home");
    navbar.classList.toggle("white", targetId === "podcast");

    targetSection.scrollIntoView({ behavior: "smooth" });
    window.history.replaceState(null, null, `#${targetId}`);
  }

  function handleScroll() {
    const currentIndex = getCurrentIndex();

    if (currentIndex !== -1) {
      const currentSection = sections[currentIndex];
      const currentId = currentSection.getAttribute("id");

      navbar.classList.toggle("navbar-hide", currentId === "home");
      window.history.replaceState(null, null, `#${currentId}`);
    }
  }

  // Evento para el desplazamiento suave al hacer clic en enlaces de ancla
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();

      const targetSection = document.querySelector(this.getAttribute("href"));
      targetSection.scrollIntoView({
        behavior: "smooth",
      });
    });
  });

  // Evento de los botones para abrir y cerrar menú
  openButton?.addEventListener("click", function () {
    backdropFilter?.classList.toggle("backdrop-filter--closed");
    sidebarMenu?.classList.toggle("sidebar-menu--closed");
    sidebarIsOpen = true;
    document.body.classList.add("no-scroll");
  });

  closeButton?.addEventListener("click", function () {
    backdropFilter?.classList.toggle("backdrop-filter--closed");
    sidebarMenu?.classList.toggle("sidebar-menu--closed");
    sidebarIsOpen = false;
    document.body.classList.remove("no-scroll");
  });

  // Evento de desplazamiento suave al hacer scroll con la ruedita
  window.addEventListener("wheel", function (event) {
    event.preventDefault();

    if (!sidebarIsOpen) {
      const deltaY = event.deltaY;
      const currentIndex = getCurrentIndex();

      let targetIndex;

      if (deltaY > 0) {
        targetIndex = currentIndex + 1;
      } else {
        targetIndex = currentIndex - 1;
      }

      if (targetIndex >= 0 && targetIndex < sections.length) {
        scrollToSection(targetIndex);
        updateActiveLink(currentIndex); 
      }

      clearTimeout(scrollTimer);
      scrollTimer = setTimeout(function () {
        handleScroll();
      }, 250); // Ajusta el tiempo según sea necesario
    }
  });

  // Evento de desplazamiento suave al hacer scroll normal
  window.addEventListener("scroll", function () {
    if (!sidebarIsOpen) {
      clearTimeout(scrollTimer);
      scrollTimer = setTimeout(function () {
        handleScroll();
      }, 250); // Ajusta el tiempo según sea necesario
    }
  });

  // Evento para ajustar a la sección más cercana al terminar de scrollear desde la barra lateral del navegador
  window.addEventListener("scroll", function () {
    if (!sidebarIsOpen) {
      clearTimeout(scrollTimer);
      scrollTimer = setTimeout(function () {
        const currentIndex = getCurrentIndex();
        if (currentIndex !== -1) {
          scrollToSection(currentIndex);
          updateActiveLink(currentIndex);
        }
      }, 250); // Ajusta el tiempo según sea necesario
    }
  });

  // Evento para ir a la primera sección
  goToFirstSection.addEventListener("click", function () {
    const academySection = document.getElementById("academy");
    academySection.scrollIntoView({ behavior: "smooth" });
  });
});
