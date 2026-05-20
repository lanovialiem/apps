
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

document.addEventListener("DOMContentLoaded", function () {
    
    // 1. Hamburger Menu
    const hamburger = document.querySelector('#hamburger');
    const navMenu = document.querySelector('#nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            this.classList.toggle('hamburger-active');
            navMenu.classList.toggle('hidden');
        });
    }

    // 2. Navbar Fixed on Scroll
    const header = document.querySelector('header');

    function checkScroll() {
        if (!header) return;
        // 50px is a standard threshold (e.g., triggers after scrolling 50px down)
        // Change this number to match your design preference
        if (window.scrollY > 50) {
            header.classList.add('navbar-fixed');
        } else {
            header.classList.remove('navbar-fixed');
        }
    }

    // Run once on load in case page is refreshed at the bottom
    checkScroll();
    
    window.addEventListener('scroll', function() {
        checkScroll();
    });

    // 3. User Dropdown (Click Outside to Close)
    const userBtn = document.getElementById("userDropdownBtn");
    const userDropdown = document.getElementById("userDropdown");

    if (userBtn && userDropdown) {
        userBtn.addEventListener("click", function (e) {
            e.stopPropagation(); // Prevent document click from triggering immediately
            userDropdown.classList.toggle("hidden");
        });

        // Close if clicking outside the dropdown or button
        document.addEventListener("click", function (e) {
            if (
                !userBtn.contains(e.target) && 
                !userDropdown.contains(e.target) && 
                !userDropdown.classList.contains("hidden")
            ) {
                userDropdown.classList.add("hidden");
            }
        });
    }

    // 4. Sidebar Toggle (Offcanvas)
    const sidebar = document.querySelector('.sidebar-menu');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const main = document.querySelector('.main'); // Some layouts move 'main' content

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
            // Toggle Sidebar
            sidebar.classList.toggle('-translate-x-full');
            
            // Toggle Overlay
            if (sidebarOverlay) sidebarOverlay.classList.toggle('hidden');
            
            // Optional: Push main content if your layout supports it
            if (main) main.classList.toggle('active'); 
        });
    }

    // Close Sidebar if clicking overlay
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            if (main) main.classList.remove('active');
        });
    }

});
      

//Button Offering Product-Quantity
    // document.querySelectorAll('.product-checkbox').forEach(cb => {
    //     cb.addEventListener('change', function() {
    //         const container = document.getElementById('qty-container');
    //         const id = this.value;
    //         const name = this.dataset.name;
    //         const qty = this.dataset.name;


    //         if (this.checked) {
    //             container.insertAdjacentHTML('beforeend', `
    //             <div id="row-${id}" class="flex items-center space-x-3">
    //                 <label class="w-40 text-sm text-gray-700">
    //                     ${name}
    //                         <input type="hidden" name="product_id[]" value="${id}">
    //                 </label>

    //                  <input type="number"
    //                        name="qty[${id}]"
    //                        min="0"
    //                        value="0"
    //                        class="block text-sm font-medium text-gray-600 mb-2">
                    
    //             </div>
    //         `);
    //         } else {
    //             document.getElementById(`row-${id}`)?.remove();
    //         }
    //     });
    // });


    // start
    // Begin: Dark Mode
// Begin: Dark Mode
// const toggleDarkMode = document.getElementById("toggleDarkMode");

// if (toggleDarkMode) {
//     toggleDarkMode.addEventListener("click", function () {
//         document.documentElement.classList.toggle("dark");
//     });
// }
// // End: Dark Mode

// // start: Sidebar
// const sidebarToggle = document.querySelector('.sidebar-toggle')
// const sidebarOverlay = document.querySelector('.sidebar-overlay')
// const sidebarMenu = document.querySelector('.sidebar-menu')
// const main = document.querySelector('.main')

// if (sidebarToggle && sidebarOverlay && sidebarMenu && main) {

//     if(window.innerWidth < 768) {
//         main.classList.toggle('active')
//         sidebarOverlay.classList.toggle('hidden')
//         sidebarMenu.classList.toggle('-translate-x-full')
//     }

//     sidebarToggle.addEventListener('click', function (e) {
//         e.preventDefault()
//         main.classList.toggle('active')
//         sidebarOverlay.classList.toggle('hidden')
//         sidebarMenu.classList.toggle('-translate-x-full')
//     })

//     sidebarOverlay.addEventListener('click', function (e) {
//         e.preventDefault()
//         main.classList.add('active')
//         sidebarOverlay.classList.add('hidden')
//         sidebarMenu.classList.add('-translate-x-full')
//     })
// }
// // end: Sidebar



// // start: Popper
// const popperInstance = {}
// document.querySelectorAll('.dropdown').forEach(function (item, index) {
//     const popperId = 'popper-' + index
//     const toggle = item.querySelector('.dropdown-toggle')
//     const menu = item.querySelector('.dropdown-menu')
//     menu.dataset.popperId = popperId
//     popperInstance[popperId] = Popper.createPopper(toggle, menu, {
//         modifiers: [
//             {
//                 name: 'offset',
//                 options: {
//                     offset: [0, 8],
//                 },
//             },
//             {
//                 name: 'preventOverflow',
//                 options: {
//                     padding: 24,
//                 },
//             },
//         ],
//         placement: 'bottom-end'
//     });
// })
// document.addEventListener('click', function (e) {
//     const toggle = e.target.closest('.dropdown-toggle')
//     const menu = e.target.closest('.dropdown-menu')
//     if (toggle) {
//         const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
//         const popperId = menuEl.dataset.popperId
//         if (menuEl.classList.contains('hidden')) {
//             hideDropdown()
//             menuEl.classList.remove('hidden')
//             showPopper(popperId)
//         } else {
//             menuEl.classList.add('hidden')
//             hidePopper(popperId)
//         }
//     } else if (!menu) {
//         hideDropdown()
//     }
// })

// function hideDropdown() {
//     document.querySelectorAll('.dropdown-menu').forEach(function (item) {
//         item.classList.add('hidden')
//     })
// }
// function showPopper(popperId) {
//     popperInstance[popperId].setOptions(function (options) {
//         return {
//             ...options,
//             modifiers: [
//                 ...options.modifiers,
//                 { name: 'eventListeners', enabled: true },
//             ],
//         }
//     });
//     popperInstance[popperId].update();
// }
// function hidePopper(popperId) {
//     popperInstance[popperId].setOptions(function (options) {
//         return {
//             ...options,
//             modifiers: [
//                 ...options.modifiers,
//                 { name: 'eventListeners', enabled: false },
//             ],
//         }
//     });
// }
// // end: Popper



// // start: Tab
// document.querySelectorAll('[data-tab]').forEach(function (item) {
//     item.addEventListener('click', function (e) {
//         e.preventDefault()
//         const tab = item.dataset.tab
//         const page = item.dataset.tabPage
//         const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
//         document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
//             i.classList.remove('active')
//         })
//         document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
//             i.classList.add('hidden')
//         })
//         item.classList.add('active')
//         target.classList.remove('hidden')
//     })
// })
// // end: Tab



// start: Chart
// new Chart(document.getElementById('order-chart'), {
//     type: 'line',
//     data: {
//         labels: generateNDays(7),
//         datasets: [
//             {
//                 label: 'Active',
//                 data: generateRandomData(7),
//                 borderWidth: 1,
//                 fill: true,
//                 pointBackgroundColor: 'rgb(59, 130, 246)',
//                 borderColor: 'rgb(59, 130, 246)',
//                 backgroundColor: 'rgb(59 130 246 / .05)',
//                 tension: .2
//             },
//             {
//                 label: 'Completed',
//                 data: generateRandomData(7),
//                 borderWidth: 1,
//                 fill: true,
//                 pointBackgroundColor: 'rgb(16, 185, 129)',
//                 borderColor: 'rgb(16, 185, 129)',
//                 backgroundColor: 'rgb(16 185 129 / .05)',
//                 tension: .2
//             },
//             {
//                 label: 'Canceled',
//                 data: generateRandomData(7),
//                 borderWidth: 1,
//                 fill: true,
//                 pointBackgroundColor: 'rgb(244, 63, 94)',
//                 borderColor: 'rgb(244, 63, 94)',
//                 backgroundColor: 'rgb(244 63 94 / .05)',
//                 tension: .2
//             },
//         ]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });

// function generateNDays(n) {
//     const data = []
//     for(let i=0; i<n; i++) {
//         const date = new Date()
//         date.setDate(date.getDate()-i)
//         data.push(date.toLocaleString('en-US', {
//             month: 'short',
//             day: 'numeric'
//         }))
//     }
//     return data
// }
// function generateRandomData(n) {
//     const data = []
//     for(let i=0; i<n; i++) {
//         data.push(Math.round(Math.random() * 10))
//     }
//     return data
// }
// // end: Chart