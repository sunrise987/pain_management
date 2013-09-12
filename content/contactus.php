<?php require '../lib/main_container_start.php'; ?>
<div id='content_top'>
<p> If you have any questions or would like to connect with us, please send us email. </p>
<form action="" method="post">
    <table class="contactus">
      <tr>
        <th><label for="name"><strong>Name:</strong></label></th>
        <td><input class="inp-text" name="name" id="name" type="text" size="30"></td>
      </tr>

      <tr>
        <th><label class="email" for="email" title="Will be masked"><strong>E-mail:</strong></label></th>
        <td><input class="inp-text" name="email" id="email" type="text" size="30"></td>
      </tr>

      <tr>
        <th><label for="title">Title:</label></th>
        <td><input class="inp-text" name="title" id="title" type="text" size="30"></td>
      </tr>

      <tr>
        <th class="message-up"><label for="message"><strong>Message:</strong></label></th>
        <td>
        <textarea name="message" id="message" cols="30" rows="5"></textarea>
        </td>
      </tr>


      <tr>
        <td class="submit-button-right" colspan="2"><input class="submit-text" type="submit" value="SEND" title="Send your message"></td>
      </tr>
    </table>
  </form>
</div>
<?php require '../lib/main_container_end.php'; ?>
