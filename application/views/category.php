<div class="container-fluid mt-3">
 <form action="" method="post">
  <label for="Category"><h4>Create Category</h4></label>
  <div class="row" id="cate">
    <div class="col-md-10">
      <input type="text" class="form-control" id="categoryname" placeholder="Enter category name" name="categoryname[]" style="margin:5px;">
      <div id ="error_name" class="error" style="color:red"></div> 
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
        var cloneIndex = $("#cate").length;
        $('.btn-success').click(function(){

           $('.ht').append($('#cate').clone(true)).find('.action_btn').html('<button class="btn btn-danger btn-xs float-left remove form-control" >Remove</button>');
      
       });
        $('.ht').on('click', '.action_btn', function(){
            $(this).closest('#cate').remove();
        })

      });
          $('form').on('submit',function(event){
            event.preventDefault(event);
            $('.error').empty();  
            var category = $('#categoryname').val();
            var error = false;
            console.log(name);
          // for name validation
          if(category.length == 0){
            document.getElementById('error_name').innerHTML = "please fill the field";
            error = true;
          }else{
            if(category.length <= 2){
              document.getElementById('error_name').innerHTML = "the name should be max 3 letters";
              error = true;
            }
          }
          if(!error){
            $.ajax({
              type: 'post',
              url: '<?php echo base_url(); ?>welcome/insertcategory',
              dataType:'json',
              data: $('form').serialize(),
              success: function(response){ 
                if(response.status == 1){
                  console.log(response);
                  $(".result").html(response.msg);
                  window.setInterval(function(){
                   window.location.href ='product.php';
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
