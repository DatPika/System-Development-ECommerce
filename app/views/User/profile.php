<?php $this->view('shared/header','Register your account'); ?>

USER PROFILE!!!

<a href="/Profile/index">See My Profile</a>

<h1>Messages</h1>

<h2>My messages</h2>

<table>
	<tr><th>sender</th><th>receiver</th><th>message</th><th>time</th><th>actions</th></tr>
<?php
//display all messages
foreach ($data as $message) {
	echo "<tr>
	<td>$message->sender_name</td>
	<td>$message->receiver_name</td>
	<td>$message->message</td>
	<td>$message->timestamp</td>
	<td><a href='/Message/delete/$message->message_id'>DELETE</a></td>
</tr>";
}
?>
</table>
<br>
<h2>Send a message</h2>
<p>Send a message using the following form:</p>
<form action='/Message/send' method='post'>

	<label>TO: <input type="text" name="receiver"></label><br/>
	<label>Message:	<textarea name="message"></textarea></label><br/>
	<input type="submit" name="action" value="Send message">

</form>

<a href='/User/logout'>logout</a>

<a href="/User/setup2fa">Set up 2 Factor Authentication </a>

<?php $this->view('shared/footer'); ?>