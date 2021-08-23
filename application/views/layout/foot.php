        <!-- Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

        <!-- Datatables -->
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <!-- Cars -->
        <script>
            $(document).ready(
                function() {
                    $('#myTable').DataTable();
                    $('#example').DataTable();

                    $('#inputFile').on('change', function() {
                        //get the file name
                        var fileName = document.getElementById("inputFile").files[0].name;
                        $(this).next('.custom-file-label').html(fileName);
                    });
                });
        </script>
        </body>

        </html>