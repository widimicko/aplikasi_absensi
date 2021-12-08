function matchCustom(params, data) {
  // If there are no search terms, return all of the data
  if ($.trim(params.term) === '') {
    return data;
  }

  // Do not display the item if there is no 'text' property
  if (typeof data.text === 'undefined') {
    return null;
  }

  // `params.term` should be the term that is used for searching
  // `data.text` is the text that is displayed for the data object
  if (data.text.indexOf(params.term) > -1) {
    var modifiedData = $.extend({}, data, true);
    modifiedData.text += ' (Cocok)';

    // You can return modified objects from here
    // This includes matching the `children` how you want in nested data sets
    return modifiedData;
  }

  // Return `null` if the term should not be displayed
  return null;
}

$(document).ready(function() {

  // Call the dataTables jQuery plugin
  $('#dataTable').DataTable({
    buttons: [
      'copy', 'excel', 'pdf'
    ],
    "language": {
      "decimal":        "",
      "emptyTable":     "Tidak ada data yang tersedia",
      "info":           "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
      "infoEmpty":      "Menampilkan 0 ke 0 dari 0 data",
      "infoFiltered":   "(Berhasil memfilter dari _MAX_ data)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Tampilkan _MENU_ data",
      "loadingRecords": "Memuat...",
      "processing":     "Memproses...",
      "search":         "Pencarian:",
      "zeroRecords":    "Tidak ditemukan data yang cocok",
      "paginate": {
        "first":      "Pertama",
        "last":       "Terakhir",
        "next":       "Selanjutnya",
        "previous":   "Sebelumnya"
      },
    }
  });

  // Call Select Search Plugin
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Pilih siswa',
      matcher: matchCustom
    });
  });

});


