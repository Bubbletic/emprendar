window.addEventListener("load", function () {
  const openButton = document.getElementById("open-menu-button");
  const closeButton = document.getElementById("close-menu-button");

  const backdropFilter = document.getElementById("backdrop-filter");
  const sidebarMenu = document.getElementById("sidebar-menu");

  openButton?.addEventListener("click", () => {
    backdropFilter?.classList.toggle("backdrop-filter--closed");
    sidebarMenu?.classList.toggle("sidebar-menu--closed");
  });

  closeButton?.addEventListener("click", () => {
    backdropFilter?.classList.toggle("backdrop-filter--closed");
    sidebarMenu?.classList.toggle("sidebar-menu--closed");
  });

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute("href")).scrollIntoView({
        behavior: "smooth",
      });
    });
  });
});
