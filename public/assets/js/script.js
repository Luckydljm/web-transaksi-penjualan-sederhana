// barang
$(document).ready(function () {
  $('#barangTable').DataTable({
    stateSave: true,
    scrollX: true,
    lengthMenu: [
      [5, 10, 15, -1],
      ['5', '10', '15', 'All'],
    ],
  });

  $('.btn-delete-barang').click(function () {
    let id_barang = $(this).data('id_barang');
    let nm_barang = $(this).attr('data-nm_barang');
    $('.id_barang').val(id_barang);
    $('.nm_barang').empty();
    $('.nm_barang').append(nm_barang);
  });

  $('.btn-update-barang').click(function () {
    let id_barang = $(this).data('id_barang');
    let kd_barang = $(this).attr('data-kd_barang');
    let nm_barang = $(this).attr('data-nm_barang');
    let harga_barang = $(this).attr('data-harga_barang');
    $('.id_barang').val(id_barang);
    $('.kd_barang').attr('value', kd_barang);
    $('.nm_barang').attr('value', nm_barang);
    $('.harga_barang').attr('value', harga_barang);
  });
});

// transaksi
$(document).ready(function () {
  $('#transaksiTable').DataTable({
    stateSave: true,
    scrollX: true,
    lengthMenu: [
      [5, 10, 15, -1],
      ['5', '10', '15', 'All'],
    ],
  });
});
