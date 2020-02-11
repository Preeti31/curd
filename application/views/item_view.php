<div class="container-fluid mt-3">

    <table class='table table-bordered'>
    <thead style='background-color: lightblue;'>
      <tr>
        <th>S.I No</th>
        <th>Item Name</th>
        <th>Action</th>
      </tr>
    </thead>
   <tbody class="text-white">
      <?php
    foreach ($itemlist as $row)
    {
      echo "<tr>";
       echo "<td></td>";
        echo "<td contenteditable='false' class='itemname'>" . $row->itemname . "</td>";
       echo "<td><button class='btn btn-info btn-xs btn-edit' data-itemname=".$row->itemname." > Edit </button>  <button class='btn btn-success btn-xs btn-save' data-itemid=".$row->id." data-itemname=".$row->itemname.">Save</button>  <button class='btn btn-danger btn-xs btn-delete' data-itemid=".$row->id.">Delete</button></td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>

    </tbody>
  </table>

</div>
<script type="text/javascript">
$(document).ready(function() {
  
  $(document).on("click", ".btn-delete", function() { 
    var itemid = $(this).attr("data-itemid");
    console.log(itemid);
    $(this).parents("tr").remove();
    
    $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/deleteitem',
              dataType:'json',
              data: {
                itemid : itemid
              },
              success: function(response){ 
              
              }   
            });
  });
  
 
     

  // Edit row on edit button click
  $(document).on("click", ".btn-edit", function(){    
        $(this).parents("tr").find("td:not(:last-child, :first-child)").each(function(){
      $(this).attr('contenteditable', 'true'); ;
    });   
    $(this).parents("tr").find(".btn-save, .btn-edit").toggle();
    
    });
  // Delete row on delete button click
  $(document).on("click", ".btn-save", function(){
        $(this).removeAttr('contenteditable');
        $(this).parents("tr").find(".btn-save, .btn-edit").toggle();
    // $(".add-new").removeAttr("disabled");
    var $row = $(this).closest("tr");
    var text = $row.find(".itemname").text();
    var itemid = $(this).attr("data-itemid");
 

    $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/edititem',
              dataType:'json',
              data: {
                itemname : text,
                itemid : itemid
                
              },
              success: function(response){ 
              
              }   
            });
    });

});
</script>
</body>
</html>
