
<!-- Single Image -->
<form>
  <input type="file" onchange="preview()">
  <img id="frame" src="" width="100px" height="100px"/>
</form>

<script>
    function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>

<!-- Single Image -->

<input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" >
  
 <img src="" id="mainThmb">


 <script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>







<!-- Multiple Image -->
<input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" >
    
 <div class="row" id="preview_img"></div>



 <script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>