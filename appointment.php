<html>
<?php  
 include "db.php";
 $title = 'Appointment - XYZ Hospital';
 include "header.php";
?> 
<body>
  <div id="appointment">
    <h2>Meet a Doctor</h2>
    <form id="appoint">
      <div class="formgrp">
      <input type="text" name="name"placeholder="Eg : John Doe">
        </div>
      <div class="formgrp">
      <input type="email"name="email" placeholder="Eg : JohnDoe@gmail.com">
         </div>
        <div class="formgrp">
        <input type="tel" name="phone" placeholder="Eg : 1234567890">
           </div>
          <div class="formgrp">
           <select name="doctor">
             <?php
      $result = mysqli_query($conn,"SELECT * FROM `doctors`");

while($row = mysqli_fetch_array($result))
{
  
  $doc = $row['doctor'];
echo "<option value='" . $doc . "'>".$doc."</option>";
  
}
  ?>
  </select>
             </div>
            <div class="formgrp">
            <input name="date" type="date" >
               </div>
              <div class="formgrp">
              <input name="time" type="time" >
                 </div>
      <div id="log" class="formgrp">
         </div>
      <div class="formgrp">
        <button type="submit" class="sec">Book</button>
         </div>
      <a href="/bookedlist.php">See Booked List</a>
    </form>
  </div>
<?php
 ?>

  <script>
    const doctorSelected = $("[name='doctor']");
    const formtime = $("[name='time']");
    let request;
    
    $("#appoint").submit(function(event){
    event.preventDefault();
    if (request) request.abort();
    let $form = $(this);
    let $inputs = $form.find("input, select, button, textarea");
    let serializedData = $form.serialize();
    $inputs.prop("disabled", true);
    request = $.ajax({
        url: "/action.php",
        type: "post",
        data: serializedData
    });
    request.done(function (res, textStatus, jqXHR){
      $("#log").empty();
      console.log(serializedData)
      $("#log").append(res)
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    request.always(function () {
        $inputs.prop("disabled", false);
    });

});
  </script>
  </body>
</html>
<?php 
mysqli_close($conn);
?>