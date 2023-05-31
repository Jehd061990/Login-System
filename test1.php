<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<table>
  <tr>
    <td contenteditable="false">LicenseName</td>
    <td contenteditable="false">LicenseDescription</td>
    <td><input type="button" value="edit" onclick="edit()"></td>
  </tr>
  <tr>
    <td contenteditable="false">LicenseName</td>
    <td contenteditable="false">LicenseDescription</td>
    <td><input type="button" value="edit" onclick="edit()"></td>
  </tr>

</table>

<script>
    function edit()
    {
      var tableRow = $('tr');
      $(tableRow).css('background-color', '#dff0d8');
      $(tableRow).children('[contenteditable]').attr("contenteditable", "true");
      var tableData = $(tableRow).children('[contenteditable]')[0];
      $(tableData).focus();
    }
    
</script>