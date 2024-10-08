<?php
if ($user->name != ''){
    $displayName = $user->name;
}
else{
    $displayName = $user->email;
}
$myAvatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . Yii::app()->user->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . Yii::app()->user->id . '.png' : URL . '/img/avatar.png';
$userAvatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . $user->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . $user->id . '.png' : URL . '/img/avatar.png';
?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$messages; ?> <small><?php echo $displayName; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li class="active"><?php echo Language::$messages; ?></li>
  </ol>
</section>

<section class="content">
  <div class="box box-success direct-chat direct-chat-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $displayName; ?></h3>
    </div>
    <div class="box-body">
      <div class="direct-chat-messages" id="direct-chat-messages">
        
        <!-- Direct Messages -->
        <?php foreach ($messages as $message){ if ($message->user_from_id == $user->id){ ?>
        <div class="direct-chat-msg">
          <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left"><?php echo $displayName; ?></span>
            <span class="direct-chat-timestamp pull-right"><?php echo $message->date; ?></span>
          </div>
          <img class="direct-chat-img" src="<?php echo $userAvatar; ?>" alt="Message User Image">
          <div class="direct-chat-text">
            <?php echo strip_tags($message->message); ?>
          </div>
        </div>
        <?php }else{ ?>
        <div class="direct-chat-msg right">
          <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-right"><?php echo Yii::app()->user->displayName; ?></span>
            <span class="direct-chat-timestamp pull-left"><?php echo $message->date; ?></span>
          </div>
          <img class="direct-chat-img" src="<?php echo $myAvatar; ?>" alt="Message User Image">
          <div class="direct-chat-text">
            <?php echo $message->message; ?>
          </div>
        </div>
        <?php }} ?>

      </div>
    </div>
    <div class="box-footer">
      <form method="post" id="message-form">
        <div class="input-group">
          <input type="text" name="message" id="message" placeholder="<?php echo Language::$typeMessage; ?>" class="form-control">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-success btn-flat"><?php echo Language::$send; ?></button>
              </span>
        </div>
      </form>
    </div>
  </div>
</section>

<script type="text/javascript">
// Variable to hold request
var request;

// Bind to the submit event of our form
$("#message-form").submit(function(event){
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();
    
    // Let's select and cache all the fields
    var $input = document.getElementById("message");//$form.find("input, select, button, textarea");
    
    if ($input.value != ""){
      
      // Abort any pending request
      if (request) {
          request.abort();
      }
      // setup some local variables
      var $form = $(this);
      
      // Serialize the data in the form
      var serializedData = $form.serialize();
      
      // Let's disable the inputs for the duration of the Ajax request.
      // Note: we disable elements AFTER the form data has been serialized.
      // Disabled form elements will not be serialized.
      $input.disabled = true;
      // Fire off the request to /form.php
      request = $.ajax({
          url: "<?php echo URL; ?>/messages/create/<?php echo $user->id; ?>",
          type: "post",
          data: serializedData
      });
  
      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          // Append message to chat history
          var now = new Date(); //2018-07-19 23:16:32
          
          $( "#direct-chat-messages" ).append( `
              <div class='direct-chat-msg right'>
                <div class='direct-chat-info clearfix'>
                  <span class='direct-chat-name pull-right'><?php echo Yii::app()->user->displayName; ?></span>
                  <span class='direct-chat-timestamp pull-left'> ` + now + `</span>
                </div>
                <img class='direct-chat-img' src='<?php echo $myAvatar; ?>' alt='Message User Image'>
                <div class='direct-chat-text'>
                  ` + $("#message").val() + `
                </div>
              </div>
              `);
          $("#message").val("");
          var objDiv = document.getElementById("direct-chat-messages");
          objDiv.scrollTop = objDiv.scrollHeight;
      });
  
      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
      });
  
      // Callback handler that will be called regardless
      // if the request failed or succeeded
      request.always(function () {
          // Reenable the inputs
          $input.disabled = false;
      });
    }

});

<?php if($user->id != Yii::app()->user->id){ ?>
$(window).on('load', function () {
    url = "<?php echo URL; ?>/messages/get/<?php echo $user->id; ?>",
    callback = function (data) {
        $.each(data, function (i, val) {
            $( "#direct-chat-messages" ).append( `
            <div class='direct-chat-msg'>
              <div class='direct-chat-info clearfix'>
                <span class='direct-chat-name pull-left'><?php echo $displayName; ?></span>
                <span class='direct-chat-timestamp pull-right'>` + val.date + `</span>
              </div>
              <img class='direct-chat-img' src='<?php echo $userAvatar; ?>' alt='Message User Image'>
              <div class='direct-chat-text'>
                ` + val.message + `
              </div>
            </div>
            `);
        });
        var objDiv = document.getElementById("direct-chat-messages");
        objDiv.scrollTop = objDiv.scrollHeight;
    },
    fetchData = function () {
        $.getJSON(url, callback);
    };
    fetchData();
    setInterval(fetchData, 5000);
});
<?php } ?>
</script>