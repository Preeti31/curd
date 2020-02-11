<div class="container-fluid mt-3">
  <form action="" method="post">
    <label for="sel1"><h4>Select Product:</h4></label>

  <div class="row" id="item" style="margin:5px;">
    <div class="col-md-5">
          <select class="form-control" id="productname" name="productname[]">
            <option value="">Select option</option>
             
           <?php
 
  foreach ($productist as $row)
    {

echo "<option value=" . $row->id .">" . $row->productname . "</option>";

}
?>
          </select>
    </div>
    <div class="col-md-5">
      
          <input type="text" class="form-control" id="itemname" placeholder="Enter item name" name="itemname[]">
          <div id ="error_itemname" class="error" style="color:red"></div>
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
<script type="text/javascript">
  $(document).ready(function(){
        var cloneIndex = $("#item").length;
        $('.btn-success').click(function(){

           $('.ht').append($('#item').clone(true)).find('.action_btn').html('<button class="btn btn-danger btn-xs float-left remove form-control" >Remove</button>');
      
       });
        $('.ht').on('click', '.action_btn', function(){
            $(this).closest('#item').remove();
        })

      });
          $('form').on('submit',function(event){
            event.preventDefault(event);
            $('.error').empty();  
            var item = $('#itemname').val();
            var error = false;
            
          // for name validation
          if(item.length == 0){
            document.getElementById('error_itemname').innerHTML = "please fill the field";
            error = true;
          }else{
            if(item.length <= 2){
              document.getElementById('error_itemname').innerHTML = "the name should be max 3 letters";
              error = true;
            }
          }
          if(!error){
            
            $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/insertitem',
              dataType:'json',
              data: $('form').serialize(),
              success: function(response){ 
                if(response.status == 1){
                  console.log(response);
                  $(".result").html(response.msg);
                  window.setInterval(function(){
                   window.location.href ='view.php';
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
