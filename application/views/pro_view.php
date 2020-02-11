
<div class="container-fluid mt-3">
     <table class='table table-bordered'>
    <thead style='background-color: lightblue;'>
      <tr>
        <th>S.I No</th>
        <th>Product Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="text-white">
      <?php
    foreach ($productist as $row)
    {
      echo "<tr>";
       echo "<td></td>";
        echo "<td contenteditable='false' class='productname'>" . $row->productname . "</td>";
       echo "<td><button class='btn btn-info btn-xs btn-edit' data-productname=".$row->productname." > Edit </button>  <button class='btn btn-success btn-xs btn-save' data-productid=".$row->id." data-productname=".$row->productname.">Save</button>  <button class='btn btn-danger btn-xs btn-delete' data-productid=".$row->id.">Delete</button></td>";
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
    var productid = $(this).attr("data-productid");
    console.log(productid);
    $(this).parents("tr").remove();
    
    $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/deleteproduct',
              dataType:'json',
              data: {
                productid : productid
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
    var text = $row.find(".productname").text();
    var productid = $(this).attr("data-productid");
 

    $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/editproduct',
              dataType:'json',
              data: {
                productname : text,
                productid : productid
                
              },
              success: function(response){ 
              
              }   
            });
    });

});
</script>
</body>
</html>
