// Tabs and buttons
$(document).ready(function () {
    // Array of all tab-ids
    var tabs = ['informacion', 'envio', 'productos'];

    // Add click event listener to all 'Siguiente' buttons
    $('.siguiente').click(function (e) {
        e.preventDefault();

        // Find the current active tab
        var activeTab = $('.nav-link.active').attr('id').split('-')[0];

        // Find the index of the next tab
        var nextTabIndex = tabs.indexOf(activeTab) + 1;

        // If there is a next tab
        if (nextTabIndex < tabs.length) {
            // Remove 'active' class from current tab and pane
            $('#' + activeTab + '-tab').removeClass('active');
            $('#' + activeTab).removeClass('show active');

            // Add 'active' class to next tab and pane
            $('#' + tabs[nextTabIndex] + '-tab').addClass('active');
            $('#' + tabs[nextTabIndex]).addClass('show active');
        }
    });

    // Add click event listener to 'btn_anterior_1'
    $('#btn_anterior_1').click(function (e) {
        e.preventDefault();

        // Remove 'active' class from current tab and pane
        var activeTab = $('.nav-link.active').attr('id').split('-')[0];
        $('#' + activeTab + '-tab').removeClass('active');
        $('#' + activeTab).removeClass('show active');

        // Add 'active' class to first tab and pane
        $('#informacion-tab').addClass('active');
        $('#informacion').addClass('show active');
    });

    // Add click event listener to 'btn_anterior_2'
    $('#btn_anterior_2').click(function (e) {
        e.preventDefault();

        // Remove 'active' class from current tab and pane
        var activeTab = $('.nav-link.active').attr('id').split('-')[0];
        $('#' + activeTab + '-tab').removeClass('active');
        $('#' + activeTab).removeClass('show active');

        // Add 'active' class to second tab and pane
        $('#envio-tab').addClass('active');
        $('#envio').addClass('show active');
    });
});

// Select2 Dependent / Cascading Select List
var Select2Cascade = (function (window, $) {

    function Select2Cascade(parent, child, url, select2Options) {
        var afterActions = [];
        var options = select2Options || {};

        // Register functions to be called after cascading data loading done
        this.then = function (callback) {
            afterActions.push(callback);
            return this;
        };

        parent.select2(select2Options).on("change", function (e) {

            child.prop("disabled", true);

            var _this = this;
            $.getJSON(url.replace(':parentId:', $(this).val()), function (items) {
                var newOptions = '<option value="">-- Seleccione Dirección --</option>';
                for (var id in items) {
                    newOptions += '<option value="' + id + '">' + items[id] + '</option>';
                }

                child.select2('destroy').html(newOptions).prop("disabled", false)
                    .select2(options);

                afterActions.forEach(function (callback) {
                    callback(parent, child, items);
                });
            });
        });
    }

    return Select2Cascade;

})(window, $);

$(document).ready(function () {
    var select2Options = { width: 'resolve', theme: 'bootstrap-5' };

    var apiUrl = ':parentId:.json';

    $('#destinatario').select2(select2Options);
    $('#destinoDireccion').select2(select2Options);
    $('#seleccionarProducto').select2(select2Options);
    var cascadLoading = new Select2Cascade($('#destinatario'), $('#destinoDireccion'), apiUrl, select2Options);
    cascadLoading.then(function (parent, child, items) {
        // Dump response data
        console.log(items);
    });
});

// Agregar producto button and PRODUCTOS table
document.getElementById('agregarProducto').addEventListener('click', function () {
    // Get the selected product
    var selectedProduct = document.getElementById('seleccionarProducto').value;

    // Check if the selected product has a value
    if (selectedProduct != '') {
        // Create a new row
        var newRow = document.createElement('tr');

        // Create a cell for the product
        var productCell = document.createElement('td');
        productCell.textContent = selectedProduct;
        productCell.style.minWidth = '12rem'; // Set the minimum width of the cell
        newRow.appendChild(productCell);


        // Create a cell with an input for the quantity
        var quantityCell = document.createElement('td');
        var quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.value = '1'; // Default quantity
        quantityInput.className = 'form-control'; // Add the form-control class
        quantityInput.style.width = '5rem'; // Set the width of the input
        quantityCell.appendChild(quantityInput);
        newRow.appendChild(quantityCell);

        // Create a cell with a remove button
        var actionCell = document.createElement('td');
        var removeButton = document.createElement('button');
        removeButton.innerHTML = '<i class="fa fa-trash-o"></i>'; // Use innerHTML instead of textContent
        removeButton.className = 'btn btn-danger'; // Add classes to the button
        removeButton.onclick = function () {
            // Remove the current row
            this.closest('tr').remove();
        };
        actionCell.appendChild(removeButton);
        newRow.appendChild(actionCell);

        // Add the new row to the table
        document.getElementById('productTable').querySelector('tbody').appendChild(newRow);
    }
});

// PDF
function generatePDF(event) {
    event.preventDefault(); // Prevent the default form submission

    // Collect form data
    const formData = new FormData(event.target);
    const destinatario = formData.get('destinatario');
    const destinoDireccion = formData.get('destinoDireccion');
    const fechaEmision = formData.get('fechaEmision');
    // Collect other form data as needed

    // Load the template.html file
    fetch('template.html')
        .then(response => response.text())
        .then(templateHtml => {
            // Modify the template with the collected form data
            const modifiedTemplate = templateHtml.replace('{{destinatario}}', destinatario)
                .replace('{{destinoDireccion}}', destinoDireccion)
                .replace('{{fechaEmision}}', fechaEmision);
            // Create a new HTML element to hold the modified template
            const templateElement = document.createElement('div');
            templateElement.innerHTML = modifiedTemplate;
            document.body.appendChild(templateElement);

            // Convert the HTML content to a PDF using html2canvas and jsPDF
            html2canvas(templateElement).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('guia_remision.pdf');

                // Remove the temporary template element
                document.body.removeChild(templateElement);
            });
        })
        .catch(error => console.error('Error:', error));
}
