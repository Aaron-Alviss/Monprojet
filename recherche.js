// ===================== Recherche dynamique =====================
const searchInput = document.getElementById("searchInput");
if (searchInput) {
  searchInput.addEventListener("keyup", function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll("#teacherTable tbody tr");
      rows.forEach(row => {
          const text = row.textContent.toLowerCase();
          row.style.display = text.includes(filter) ? "" : "none";
      });
  });
}