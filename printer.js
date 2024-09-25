function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 function show_hide_column(col_no, do_show) {

    var stl;
    if (do_show) stl = 'block'
    else         stl = 'none';

    var tbl  = document.getElementById('tableorders');
    var rows = tbl.getElementsByTagName('tr');

    for (var row=0; row<rows.length;row++) {
      var cels = rows[row].getElementsByTagName('td')
      cels[col_no].style.display=stl;
    }
  }