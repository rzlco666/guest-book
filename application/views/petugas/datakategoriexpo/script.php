<!-- My Script -->
<script>
    let status; // Menampung status "tambah, edit dan hapus"
    let url; // Menampung url untuk save dan update
    let form_kategori = 'form-kategori';

    $(document).ready(function() {
        tampil_kategori();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_kategori() {
        $('#tabel-kategori').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            processing: true,
            serverSide: true,
            bDestroy: true,
            responsive: true,
            ajax: {
                url: "<?= base_url('DataKategoriExpo/get_kategori'); ?>",
                type: "POST",
                data: {},
            },
            columnDefs: [{
                    targets: [0, 0, -0],
                    orderable: false,
                },
                {
                    width: "1%",
                    targets: [0, 0, 0],
                },
            ],
        });
    }

    // Check berdasarkan status yang aktif dan set button dan url
    function check_status() {
        switch (status) {
            case 'tambah':
                $('#btn-proses').text('Save Changes');
                url = "<?= base_url('DataKategoriExpo/save_kategori'); ?>";
                break;
            case 'edit':
                $('#btn-proses').text('Update Changes');
                url = "<?= base_url('DataKategoriExpo/update_kategori'); ?>";
                break;
            case 'hapus':
                url = "<?= base_url('DataKategoriExpo/delete_kategori'); ?>";
                break;
        }
    }
    // Clear form
    function clear_form() {
        $('#' + form_kategori)[0].reset();
    }
    // Fungsi untuk menampilkan modal tambah data
    function tambah() {
        status = 'tambah';
        clear_form();
        $('#modal-kategori').modal('show')
            .find('.modal-title').text('Tambah Data');
    }
    // Fungsi untuk menampilkan modal edit data
    function edit(id_kategori_expo) {
        status = 'edit';
        $('#modal-kategori').modal('show')
            .find('.modal-title').text('Edit Data');
        clear_form();
        $.ajax({
            url: "<?= base_url('DataKategoriExpo/edit_kategori'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_kategori_expo: id_kategori_expo,
            },
            success: function(x) {
                if (x.status == true) {
                    $('#id_kategori_expo').val(x.data.id_kategori_expo);
                    $('#nama').val(x.data.nama);
                }
            }
        });
    }
    // Fungsi untuk proses simpan dan update data siswa
    function proses() {
        check_status();

        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: $('#' + form_kategori).serialize(),
            success: function(x) {
                if (x.status == true) {
                    $('#modal-kategori').modal('hide');
                    $('#notifikasi').html('');
                    $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
              ${x.message}
            </div>`);
                    tampil_kategori();
                    $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                        $("#notif").slideUp(500);
                    });
                }
            }
        });
    }
    // Fungsi untuk proses hapus data siswa
    function hapus(id_kategori_expo) {
        if (confirm('Yakin untuk menghapus data?')) {
            status = 'hapus';

            check_status();

            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: {
                    id_kategori_expo: id_kategori_expo
                },
                success: function(x) {
                    if (x.status == true) {
                        $('#notifikasi').html('');
                        $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
                ${x.message}
              </div>`);
                        tampil_kategori();
                        $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                            $("#notif").slideUp(500);
                        });
                    }
                }
            });
        }
    }
</script>