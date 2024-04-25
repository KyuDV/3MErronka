<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Txartela kreditua</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">
 
    <style>
    .loader-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
    }
 
    .loader-container {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        text-align: center;
        z-index: 999;
    }
 
    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }
 
    .success-message {
        display: none;
        color: #2ecc71;
        font-size: 18px;
        margin-top: 20px;
    }
 
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
 
        100% {
            transform: rotate(360deg);
        }
    }
    </style>
</head>
 
<body>
    <div class="wrapper">
        <div class="payment">
            <div class="payment-logo">
                <p>RF</p>
            </div>
            <h2>Erosketaren pasarela</h2>
            <div class="form">
                <div class="card space icon-relative">
                    <label class="label">Txartelaren titularra:</label>
                    <input type="text" class="input" placeholder="Kodetze Merkatua">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card space icon-relative">
                    <label class="label">Txartelaren Zenbakia:</label>
                    <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Txartel zenbakia">
                    <i class="far fa-credit-card"></i>
                </div>
                <div class="card-grp space">
                    <div class="card-item icon-relative">
                        <label class="label">Iraungitze data:</label>
                        <input type="text" name="expiry-data" class="input" data-mask="00 / 00" placeholder="00 / 00">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-item icon-relative">
                        <label class="label">CVC:</label>
                        <input type="text" class="input" data-mask="000" placeholder="000">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
 
                <div class="btn" id="ordainduBtn">Ordaindu</div>
            </div>
        </div>
    </div>
 
    <!-- Loader overlay -->
    <div class="loader-overlay" id="overlay"></div>
 
    <!-- Loader container -->
    <div class="loader-container" id="loaderContainer">
        <div class="loader"></div>
    </div>
 
    <!-- Success message container -->
    <div class="loader-container" id="successContainer">
        <div class="success-message" id="successMessage">Pago realizado con éxito</div>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
 
    <script>
    $(document).ready(function() {
        $('#ordainduBtn').on('click', function() {
            // Show overlay and loader
            $('#overlay').fadeIn();
            $('#loaderContainer').fadeIn();
 
            // Simulate a delay (you can replace this with your actual payment processing logic)
            setTimeout(function() {
                // Hide overlay and loader after the payment processing is done (replace this with your actual logic)
                $('#overlay').fadeOut();
                $('#loaderContainer').fadeOut();
 
                // Show success message
                $('#successContainer').fadeIn();
            }, 2000);
        });
    });
    </script>
</body>
 
</html>