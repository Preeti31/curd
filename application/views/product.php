<div class="container-fluid mt-3">
  <form action="" method="post">
    <label for="sel1"><h4>Select Category:</h4></label>

  <div class="row" id="pro" style="margin:5px;">
    <div class="col-md-5">
          <select class="form-control" id="categoryname" name="categoryname[]">
            <div id ="error_categoryname" class="error" style="color:red"></div>
            <option value="">Select option</option>
           <?php
 
  foreach ($categorylist as $row)
    {

echo "<option value=" . $row->id .">" . $row->categoryname . "</option>";

}
?>
</select>
    </div>
    <div class="col-md-5">
      
          <input type="text" class="form-control" id="productname" placeholder="Enter project name" name="productname[]">
          <div id ="error_productname" class="error" style="color:red"></div>
    </div>
    <div class="col-md-2 action_btn">
      <button type="button" class="btn btn-success btn-xs float-left add_more form-control" >Add more</button>
    </div>
  </div>
  <div class="ht"></div>
  <div class="btn">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
        var cloneIndex = $("#pro").length;
        $('.btn-success').click(function(){

           $('.ht').append($('#pro').clone(true)).find('.action_btn').html('<button class="btn btn-danger btn-xs float-left remove form-control" >Remove</button>');
      
       });
        $('.ht').on('click', '.action_btn', function(){
            $(this).closest('#pro').remove();
        })

      });
          $('form').on('submit',function(event){
            event.preventDefault(event);
            $('.error').empty();  
            var product = $('#productname').val();
            var category = $('#categoryname').val();
            var error = false;
            
          // for name validation
          if(product.length == 0){
            document.getElementById('error_productname').innerHTML = "please fill the field";
            error = true;
          }else{
            if(product.length <= 2){
              document.getElementById('error_productname').innerHTML = "the name should be max 3 letters";
              error = true;
            }
          }
          

          if(!error){
            
            $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/insertproduct',
              dataType:'json',
              data: $('form').serialize(),
              success: function(response){ 
                if(response.status == 1){
                  console.log(response);
                  $(".result").html(response.msg);
                  window.setInterval(function(){
                   window.location.href ='item.php';
                }, 1000);
              }else{
                $(".result").html(response.msg); 
              }
              }   
            });
          }    
        })
</script>
</body>
</html>
