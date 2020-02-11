<div class="container-fluid mt-3">
<div class="tab">
    <table class='table table-bordered'>
    <thead style='background-color: lightblue;'>
      <tr>
        <th>S.I No</th>
        <th>Category Name</th>
         <th>Action</th>
      </tr>
    </thead>
    <tbody class="text-white">
      <?php
    foreach ($categorylist as $row)
    {
      echo "<tr>";
       echo "<td></td>";
        echo "<td contenteditable='false' class='categoryname'>" . $row->categoryname . "</td>";
        echo "<td><button class='btn btn-info btn-xs btn-edit' data-categoryname=".$row->categoryname." > Edit </button>  <button class='btn btn-success btn-xs btn-save' data-categoryid=".$row->id." data-categoryname=".$row->categoryname.">Save</button>  <button class='btn btn-danger btn-xs btn-delete' data-categoryid=".$row->id.">Delete</button></td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>

    </tbody>
  </table>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  
  $(document).on("click", ".btn-delete", function() { 
    var categoryid = $(this).attr("data-categoryid");
    console.log(categoryid);
    $(this).parents("tr").remove();
    
    $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/deletecategory',
              dataType:'json',
              data: {
                categoryid : categoryid
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
    var row = $(this).closest("tr");
    var text = row.find(".categoryname").text();
    var categoryid = $(this).attr("data-categoryid");
 

    $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/editcategory',
              dataType:'json',
              data: {
                categoryname : text,
                categoryid : categoryid
                
              },
              success: function(response){ 
              
              }   
            });
    });

});
</script>
</body>
</html>
