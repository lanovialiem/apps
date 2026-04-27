
//Hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
hamburger.addEventListener('click', function() {
    this.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

//navbar fixed
window.onscroll = function() {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.scrollY >= fixedNav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};

//dropdown toggle
const btn = document.getElementById("userDropdownBtn");
const dropdown = document.getElementById("userDropdown");

if (btn) {
    btn.addEventListener("click", function (e) {
        e.stopPropagation();
        dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", function () {
        dropdown.classList.add("hidden");
    });
}

//Button Offering Product-Quantity
    document.querySelectorAll('.product-checkbox').forEach(cb => {
        cb.addEventListener('change', function() {
            const container = document.getElementById('qty-container');
            const id = this.value;
            const name = this.dataset.name;
            const qty = this.dataset.name;


            if (this.checked) {
                container.insertAdjacentHTML('beforeend', `
                <div id="row-${id}" class="flex items-center space-x-3">
                    <label class="w-40 text-sm text-gray-700">
                        ${name}
                            <input type="hidden" name="product_id[]" value="${id}">
                    </label>

                     <input type="number"
                           name="qty[${id}]"
                           min="0"
                           value="0"
                           class="block text-sm font-medium text-gray-600 mb-2">
                    
                </div>
            `);
            } else {
                document.getElementById(`row-${id}`)?.remove();
            }
        });
    });

