// PRINTS THE INVOICE/RECEIPT
function printInvoice() {
    var printButton = document.querySelector('.invoice-btn');
    if (printButton) printButton.style.display = 'none';

    // Hide sidebar and header wrapper before printing
    var sidebar = document.querySelector('.sidebar');
    var headerWrapper = document.querySelector('.header_wrapper');
    if (sidebar) sidebar.style.display = 'none';
    if (headerWrapper) headerWrapper.style.display = 'none';

    // Print the invoice
    window.print();

    // Show the hidden elements after printing
    if (sidebar) sidebar.style.display = '';
    if (headerWrapper) headerWrapper.style.display = '';
}


document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll('.menu li a');

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            // Prevent the default action of the link
            event.preventDefault();

            // Toggle the active class of the clicked link's parent li
            link.parentNode.classList.toggle('active');

            // Store the active link's href in local storage
            if (link.parentNode.classList.contains('active')) {
                localStorage.setItem('activeLink', link.getAttribute('href'));
            } else {
                localStorage.removeItem('activeLink');
            }

            // Navigate to the clicked link's href
            window.location.href = link.getAttribute('href');
        });
    });


    // Check if there is an active link stored in local storage
    var activeLink = localStorage.getItem('activeLink');
    if (activeLink) {
        var activeElement = document.querySelector('.menu li a[href="' + activeLink + '"]');
        if (activeElement) {
            activeElement.parentNode.classList.add('active');
        }
    }
});




