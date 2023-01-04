<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Test View</title>
</head>

<body>



    <div class="containter-fluid">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Input</div>
                    <form id="form_upload">


                        <div class="card-body">
                            <input type="text" placeholder="name" name="nama" id="nama" class="form-control">
                            <br>
                            <input type="text" placeholder="kelas" name="kelas" id="kelas" class="form-control">
                            <br>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="button" value="Simpan" id="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <h1 id="result"></h1>
            </div>
            <div class="col-4"></div>
        </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.6/dist/umd/popper.min.js" integrity="sha384-cBhcnRf9TqT3TQvDYG4l8ZAnfRJT0lmB+jTc8g9hT3TbJxjGkZ4M8s1RiZMumHfv" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        $("#submit").on('click', function() {


            // alert(document.getElementById('gambar').files);
            $.post("<?= base_url('test/test_upload') ?>", {
                nama : document.getElementById('nama').value,
                kelas : document.getElementById('kelas').value,
                gambar : document.getElementById('gambar').files

            }, function(data, status){
                $("#result").html(data);

                
            });

            $("#nama").val("");
            $("#kelas").val("");

            
        });
    </script>

</body>

</html>