<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Remisión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css"
        media="print">
</head>

<body>
    <div class="container mt-1 col-lg-8 col-12">
        <div class="row mb-4 align-items-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-2">
                        <img class="w-100 img-fluid" src="assets/logo.jpg" alt="">
                    </div>
                    <div class="col-5">
                        <h4 class="fw-bold">RODAPRINT CORPORACION GRAFICA EIRL</h4>
                        <p class="mb-0 mt-0">PRINCIPAL » AV. NICOLAS AYLLON NRO. 2000</p>
                        <p class="mb-2 mt-0">URB. MARISCAL CASTILLA - LIMA LIMA SAN LUIS</p>
                        <p class="mb-0 mt-0">Contacto:</p>
                        <p class="mb-0 mt-0">Email: gerencia@rodaprint.com.pe</p>
                        <p class="mb-0 mt-0">Fijo: 5759538 Cel.: 945325508</p>
                    </div>
                    <div class="col-5 px-0 text-center border border-dark border-2">
                        <h4 class="pt-2 pb-1">RUC 20601276144</h4>
                        <h5 class="fw-bold bg-secondary bg-opacity-25 py-3">GUIA DE REMISION REMITENTE ELECTRONICA</h5>
                        <h4 class="py-1">T001-0008771</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3 border border-dark border-2 pb-1">
            <h5 class="fw-bold pb-1 mb-0 bg-secondary bg-opacity-25">DESTINATARIO</h5>
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <p class="mb-0 mt-0"><b>RUC/DNI</b></p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0">00000000000</p>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0 mt-0"><b>FECHA EMISIÓN</b></p>
                            </div>
                            <div class="col-6">
                                <p id="fechaEmision" class="mb-0 mt-0"><?php echo $_POST['fechaEmision'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <p class="mb-0 mt-0"><b>RAZON SOCIAL</b></p>
                    </div>
                    <div class="col-10">
                        <p class="mb-0 mt-0"><?php echo $_POST['destinatario'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <p class="mb-0 mt-0"><b>DIRECCIÓN</b></p>
                    </div>
                    <div class="col-10">
                        <p class="mb-0 mt-0"><?php echo $_POST['destinoDireccion'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 border border-dark border-2 pb-1">
            <h5 class="fw-bold pb-1 mb-0 bg-secondary bg-opacity-25">ENVIO</h5>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0 mt-0"><b>TIPO ENVIO</b></p>
                    </div>
                    <div class="col-5">
                        <p class="mb-0 mt-0">VENTA</p>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0 mt-0"><b>FECHA DE ENVÍO</b></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-0 mt-0"><?php echo $_POST['fechaEnvio'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0 mt-0"><b>PESO BRUTO TOTAL</b></p>
                    </div>
                    <div class="col-5">
                        <p class="mb-0 mt-0">
                            <?php echo ($_POST['pesoTotal'] ?? '') . ' ' . ($_POST['pesoUnidad'] ?? ''); ?>
                        </p>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0 mt-0"><b>N° DE BULTOS</b></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-0 mt-0"><?php echo $_POST['cantidadBultos'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0 mt-0"><b>PUNTO DE PARTIDA</b></p>
                    </div>
                    <div class="col-9">
                        <p class="mb-0 mt-0">150134 - SAN LUIS/LIMA/LIMA AV. NICOLAS ARRIOLA 2000</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0 mt-0">
                            <b>PUNTO DE LLEGADA</b>
                        </p>
                    </div>
                    <div class="col-9">
                        <p class="mb-0 mt-0">
                            <?php echo $_POST['destinoDireccion'] ?? ''; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0 mt-0">
                            <b>TIPO DE TRANSPORTE</b>
                        </p>
                    </div>
                    <div class="col-9">
                        <p class="mb-0 mt-0">
                            TRANSPORTE PRIVADO
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 border border-dark border-2 pb-1">
            <h5 class="fw-bold pb-1 mb-0 bg-secondary bg-opacity-25">CONDUCTORES</h5>
            <p class="mb-0 mt-0">BERNABE SANCHEZ JHONNY RICHARD (10251448) - Número de licencia de conducir: Q10251448
            </p>
        </div>
        <div class="row mb-3 border border-dark border-2 pb-1">
            <h5 class="fw-bold pb-1 mb-0 bg-secondary bg-opacity-25">VEHICULO</h5>
            <p class="mb-0 mt-0">Número de placa: BKT908</p>
        </div>
        <div class="row mb-3 border border-dark border-2 pb-1">
            <table class="table table-borderless">
                <thead class="text-uppercase">
                    <tr>
                        <th style="background-color: #dadcde;" scope="col">N°</th>
                        <th style="background-color: #dadcde;" scope="col">Unidad</th>
                        <th style="background-color: #dadcde;" scope="col">Descripción</th>
                        <th style="background-color: #dadcde;" scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Add rows here -->
                    <?php
                        $selectedProducts = $_POST['selectedProduct'];
                        $productoCantidades = $_POST['productoCantidad'];
                        foreach ($selectedProducts as $index => $product) {
                            $cantidad = $productoCantidades[$index];
                            echo "<tr>";
                            echo "<td>" . ($index + 1) . "</td>";
                            echo "<td>UNIDADES</td>";
                            echo "<td>" . htmlspecialchars($product) . "</td>";
                            echo "<td>" . htmlspecialchars($cantidad) . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mb-3 border border-dark border-2 pb-1">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0 mt-0">
                            <b>OBSERVACIONES</b>
                        </p>
                    </div>
                    <div class="col-9">
                        <p class="mb-0 mt-0">
                            <?php echo $_POST['observaciones'] ?? ''; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!--<script>
        // Wait for the document to be fully loaded before executing the script
        document.addEventListener("DOMContentLoaded", function () {
            // Create a new jsPDF instance with page size options
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                format: 'a4' // Set the page format to A4
            });

            // Select the HTML element containing the content you want to include in the PDF
            const element = document.querySelector(".container");

            // Generate the PDF from the HTML element
            html2canvas(element, {
                scale: 2, // Adjust this value based on the resolution you need
                useCORS: true, // Include this option to fix cross-origin issue if needed
                allowTaint: true // Include this option to fix cross-origin issue if needed
            }).then(function (canvas) {
                var imgData = canvas.toDataURL('image/png');
                var imgProps = doc.getImageProperties(imgData);
                var pdfWidth = doc.internal.pageSize.getWidth();
                var pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                // Set margins
                var marginLeft = 10; // Adjust as needed
                var marginTop = 10; // Adjust as needed
                var marginBottom = 10; // Adjust as needed
                var marginRight = 10; // Adjust as needed

                // Add image with margins
                doc.addImage(imgData, 'PNG', marginLeft, marginTop, pdfWidth - marginLeft - marginRight, pdfHeight - marginTop - marginBottom);
                doc.save("guia_remision.pdf");
            });
        });
    </script>-->
</body>

</html>