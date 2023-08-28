document.addEventListener('DOMContentLoaded', function () {
    // DOM Elements ------------
    const openButton = document.getElementById('openMenuButton');
    const closeButton = document.getElementById('closeMenuButton');
    const backdropFilter = document.getElementById('backdropFilter');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sections = document.querySelectorAll('.section-wrapper');
    const navbar = document.getElementById('navbar');
    const goToFirstSection = document.getElementById('goToFirstSection');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    const dropdownInput = document.getElementById('dropdownInput');
    const dropdownList = document.querySelector('.dropdown-list');
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const inputFields = document.querySelectorAll('.contact-form__input');
    // ----------------------------
  
    // Handlers ------------------
    function isPassiveEvent() {
      return !navigator?.userAgent?.includes('Chrome') || isMobileOrSmallScreen();
    }
  
    function updateActiveLink(currentIndex) {
      sidebarLinks.forEach((link, index) => {
        link.classList.toggle('active', index + 1 === currentIndex);
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
      const targetId = targetSection.getAttribute('id');
  
      navbar.classList.toggle('navbar-hide', targetId === 'home');
      navbar.classList.toggle('white', targetId === 'podcast');
  
      targetSection.scrollIntoView({ behavior: 'smooth' });
      window.history.replaceState(null, null, `#${targetId}`);
    }
  
    function handleScroll() {
      const currentIndex = getCurrentIndex();
  
      if (currentIndex !== -1 && !isMobileOrSmallScreen()) {
        const currentSection = sections[currentIndex];
        const currentId = currentSection.getAttribute('id');
  
        navbar.classList.toggle('navbar-hide', currentId === 'home');
        window.history.replaceState(null, null, `#${currentId}`);
      }
    }
  
    function isMobileOrSmallScreen() {
      return window.innerWidth <= 1020;
    }
  
    function updateNavbar() {
      const currentIndex = getCurrentIndex();
  
      if (currentIndex !== -1) {
        const currentSection = sections[currentIndex];
        const currentId = currentSection.getAttribute('id');
  
        navbar.classList.toggle('navbar-hide', currentId === 'home');
        navbar.classList.toggle('white', currentId === 'podcast');
      }
    }
  
    // ----------------------------
  
    // Global variables -----------
  
    let scrollTimer = null;
    let sidebarIsOpen = false;
    let passiveEvent = isPassiveEvent();
  
    // ----------------------------
  
    // Event handlers -------------
  
    /* Evento para actualizar el evento wheel */
    window.addEventListener('resize', () => {
      passiveEvent = isPassiveEvent();
    });
  
    sidebarLinks.forEach((link) => {
      link.addEventListener('click', function (e) {
        setTimeout(() => {
          this.classList.toggle('active');
        }, 100);
      });
    });
  
    /* Evento para el desplazamiento suave al hacer clic en enlaces de ancla */
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
  
        const targetSection = document.querySelector(this.getAttribute('href'));
        targetSection.scrollIntoView({
          behavior: 'smooth',
        });
      });
    });
  
    /* Evento de los botones para abrir y cerrar menú */
    openButton?.addEventListener('click', function () {
      backdropFilter?.classList.toggle('backdrop-filter--closed');
      sidebarMenu?.classList.toggle('sidebar-menu--closed');
      sidebarIsOpen = true;
      document.body.classList.add('no-scroll');
    });
  
    closeButton?.addEventListener('click', function () {
      backdropFilter?.classList.toggle('backdrop-filter--closed');
      sidebarMenu?.classList.toggle('sidebar-menu--closed');
      sidebarIsOpen = false;
      document.body.classList.remove('no-scroll');
    });
  
    /* Evento de desplazamiento suave al hacer scroll con la ruedita */
    window.addEventListener(
      'wheel',
      function (event) {
        !passiveEvent && event.preventDefault();
  
        if (!sidebarIsOpen && !isMobileOrSmallScreen()) {
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
          }, 200);
        }
      },
      {
        passive: passiveEvent,
      }
    );
  
    /* Evento de desplazamiento suave al hacer scroll normal */
    window.addEventListener('scroll', function () {
      if (!sidebarIsOpen && !isMobileOrSmallScreen()) {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(function () {
          handleScroll();
        }, 200);
      }
    });
  
    /* Evento para ajustar a la sección más cercana al terminar de scrollear desde la barra lateral del navegador */
    window.addEventListener('scroll', function () {
      if (!sidebarIsOpen && !isMobileOrSmallScreen()) {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(function () {
          const currentIndex = getCurrentIndex();
          if (currentIndex !== -1) {
            scrollToSection(currentIndex);
            updateActiveLink(currentIndex);
          }
        }, 200);
      } else {
        const currentIndex = getCurrentIndex();
        updateActiveLink(currentIndex);
      }
    });
  
    /* Evento para ir a la primera sección */
    goToFirstSection.addEventListener('click', function () {
      const servicesSection = document.getElementById('services');
      servicesSection.scrollIntoView({ behavior: 'smooth' });
    });
  
    /* Actualizar la barra de navegación según la sección actual en dispositivos móviles */
    window.addEventListener('scroll', function () {
      if (isMobileOrSmallScreen()) {
        updateNavbar();
      }
    });
  
    /* Muestra la lista de opciones del input dropdown select */
    dropdownInput.addEventListener('click', function () {
      dropdownList.style.display = 'block';
    });
  
    /* Evento para actualizar el valor del input select cuando se selecciona una opción */
    dropdownItems.forEach((item) => {
      item.addEventListener('click', function () {
        dropdownInput.value = this.textContent;
        dropdownList.style.display = 'none';
      });
    });
  
    /* Evento para actualizar clases del label según tenga o no contenido el input cuando el usuario hace click fuera del dropdown */
    document.addEventListener('click', function (event) {
      if (
        !dropdownInput.contains(event.target) &&
        !dropdownList.contains(event.target)
      ) {
        dropdownList.style.display = 'none';
        if (!dropdownInput.value) {
          dropdownInput.nextElementSibling.classList.remove(
            'contact-form__label--focus'
          );
        }
      }
    });
  
    /* Evento para actualizar clases del label según tenga o no contenido el input */
    inputFields.forEach((input) => {
      input.addEventListener('focus', (e) => {
        if (e.target.name === 'contact-message') {
          input.nextElementSibling.classList.remove(
            'contact-form__label--textarea'
          );
        }
  
        input.nextElementSibling.classList.add('contact-form__label--focus');
      });
  
      input.addEventListener('blur', (e) => {
        if (e.target.name === 'contact-service') return;
  
        if (e.target.name === 'contact-message' && input.value === '') {
          input.nextElementSibling.classList.add('contact-form__label--textarea');
          return;
        }
  
        if (input.value === '') {
          input.nextElementSibling.classList.remove('contact-form__label--focus');
        }
      });
    });
  });
  