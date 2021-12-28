<!-- My Script -->
<script>
    let status; // Menampung status "tambah, edit dan hapus"
    let url; // Menampung url untuk save dan update
    let form_petugas = 'form-petugas';

    $(document).ready(function() {
        tampil_petugas();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_petugas() {
        $('#tabel-petugas').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            processing: true,
            serverSide: true,
            bDestroy: true,
            responsive: true,
            ajax: {
                url: "<?= base_url('DataPetugas/get_petugas'); ?>",
                type: "POST",
                data: {},
            },
            columnDefs: [{
                    targets: [0, -1, -2],
                    orderable: false,
                },
                {
                    width: "1%",
                    targets: [0, -1, -2],
                },
            ],
        });
    }

    // Check berdasarkan status yang aktif dan set button dan url
    function check_status() {
        switch (status) {
            case 'tambah':
                $('#btn-proses').text('Save Changes');
                url = "<?= base_url('DataPetugas/save_petugas'); ?>";
                break;
            case 'edit':
                $('#btn-proses').text('Update Changes');
                url = "<?= base_url('DataPetugas/update_petugas'); ?>";
                break;
            case 'hapus':
                url = "<?= base_url('DataPetugas/delete_petugas'); ?>";
                break;
        }
    }
    // Clear form
    function clear_form() {
        $('#' + form_petugas)[0].reset();
    }
    // Fungsi untuk menampilkan modal tambah data
    function tambah() {
        status = 'tambah';
        clear_form();
        $('#modal-petugas').modal('show')
            .find('.modal-title').text('Tambah Data');
    }
    // Fungsi untuk menampilkan modal edit data
    function edit(id_petugas) {
        status = 'edit';
        $('#modal-petugas').modal('show')
            .find('.modal-title').text('Edit Data');
        clear_form();
        $.ajax({
            url: "<?= base_url('DataPetugas/edit_petugas'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_petugas: id_petugas,
            },
            success: function(x) {
                if (x.status == true) {
                    $('#id_petugas').val(x.data.id_petugas);
                    $('#nama').val(x.data.nama);
                    $('#username').val(x.data.username);
                    $('#email').val(x.data.email);
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
            data: $('#' + form_petugas).serialize(),
            success: function(x) {
                if (x.status == true) {
                    $('#modal-petugas').modal('hide');
                    $('#notifikasi').html('');
                    $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
              ${x.message}
            </div>`);
                    tampil_petugas();
                    $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                        $("#notif").slideUp(500);
                    });
                }
            }
        });
    }
    // Fungsi untuk proses hapus data siswa
    function hapus(id_petugas) {
        if (confirm('Yakin untuk menghapus data?')) {
            status = 'hapus';

            check_status();

            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: {
                    id_petugas: id_petugas
                },
                success: function(x) {
                    if (x.status == true) {
                        $('#notifikasi').html('');
                        $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
                ${x.message}
              </div>`);
                        tampil_petugas();
                        $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                            $("#notif").slideUp(500);
                        });
                    }
                }
            });
        }
    }
</script>