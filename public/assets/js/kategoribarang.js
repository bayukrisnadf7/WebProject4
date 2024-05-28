document.addEventListener("DOMContentLoaded", function() {
    const itemsPerPage = 12;
    const items = document.querySelectorAll("#product-list .col-lg-3");
    const totalPages = Math.ceil(items.length / itemsPerPage);
    const pagination = document.querySelector(".pagination");

    function showPage(page) {
        items.forEach((item, index) => {
            item.style.display = "none";
            if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
                item.style.display = "block";
            }
        });

        pagination.querySelectorAll(".page-item").forEach(item => item.classList.remove("active"));
        pagination.querySelectorAll(".page-item")[page].classList.add("active");

        pagination.querySelector(".page-item:first-child").classList.toggle("disabled", page === 1);
        pagination.querySelector(".page-item:last-child").classList.toggle("disabled", page === totalPages);
    }

    pagination.innerHTML = `
        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
        ${Array.from({ length: totalPages }, (v, k) => `<li class="page-item"><a class="page-link" href="#">${k + 1}</a></li>`).join('')}
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    `;

    pagination.addEventListener("click", function(e) {
        if (e.target.tagName === "A") {
            e.preventDefault();
            let page = Number(e.target.textContent);
            if (isNaN(page)) {
                page = Number(pagination.querySelector(".page-item.active").textContent.trim());
                if (e.target.textContent.trim() === "Previous") {
                    page--;
                } else if (e.target.textContent.trim() === "Next") {
                    page++;
                }
            }
            if (page > 0 && page <= totalPages) {
                showPage(page);
            }
        }
    });

    showPage(1);
});
