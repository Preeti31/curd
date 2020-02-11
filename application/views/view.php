

    <div><br>
     
      <h1>View</h1>
      <input id='myInput' class='form-control float-right' type='text' placeholder='Search..'>
      
    
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
  // $('.btn-danger').click(function(){ 
  //  $(this).closest('tr').remove();
  //  });

   
   
    $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
    });
    
    $('.btn-edit').click(function() {
  var $this = $(this);
  var tds = $this.closest('tr').find('td').filter(function() {
    return $(this).find('.btn-edit').length === 0;
  });
  if ($this.html() === 'Edit') {
    $this.html('Save');
    tds.prop('contenteditable', true);
  } else {
    $this.html('Edit');
    tds.prop('contenteditable', false);
  }
})
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".data-table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

</body>
</html>
