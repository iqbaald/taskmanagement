    @yield('footer')


    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        window.submitForm = function(radio) {
            var form = radio.form; // Mengambil form dari elemen radio
            var formData = $(form).serialize(); // Mengambil data form

            $.ajax({
                url: form.action, // URL untuk mengirim data
                type: 'POST', // Metode pengiriman
                data: formData, // Data yang akan dikirim
                success: function(response) {
                    console.log('Form submitted successfully:', response);
                    // Anda bisa menambahkan logika untuk memperbarui tampilan jika diperlukan
                },
                error: function(xhr) {
                    console.error('Error submitting form:', xhr);
                }
            });
        };
    });
</script>

</body>

</html>