<?phpclass Contact extends Controller{		function Contact(){		parent::Controller();	}	function index(){		$contactform = <<<CONTACTFORM		<form method="POST" action="/contact/sendform/">			<table class="rsvp">				<tr>					<td>Your Name: </td>					<td><input type="text" size="45" name="name" /></td>				</tr>				<tr>					<td>Your E-Mail Address: </td>					<td><input type="text" size="45" name="email" /></td>				</tr>				<tr>					<td>Your Message: </td>					<td><textarea cols="45" rows="5" name="message"> </textarea></td>				</tr>				<tr>					<td align="right" colspan="2"><input type="submit" value="Submit" name="submit" /></td>				</tr>			</table>		</form>CONTACTFORM;		$data['title'] = "Contact Page";		$data['formspot'] = $contactform;		$this->load->view('common/header', $data);		$this->load->view('contact_view', $data);		$this->load->view('common/footer');	}	function sendform(){		if(isset($_POST['submit']) && 			isset($_POST['name']) &&			isset($_POST['email']) &&			isset($_POST['message']) &&			!empty($_POST['name']) &&			!empty($_POST['email']) &&			!empty($_POST['message'])){			$name = $_POST['name'];			$message = $_POST['message'];				$email = $_POST['email'];			$subject = "New Message from the Wedding Site!";			$message = "New Message from the contact form at our Wedding site...\n\n$message\n\n\nSincerely,\n\n$name\n$email\n";			$message = wordwrap($message, 70);			mail('brideandgroom@yourweddingsite.com', $subject, $message);  // CHANGE THIS			$endmessage = "<p class=\"succeed\"><font color=\"white\"><b>Your email has been sent. We'll get back you real soon! Thanks! </font></b></p><br /><br />";		}		else{ $endmessage = "<p class=\"fail\"><font color=\"white\"><b>MESSAGE NOT SENT because you probably forgot to fill something out. <a style=\"color:lightblue\" href=\"/contact/\">Try Again</a>, and this time get it right, huh? </font></b></p><br /><br />"; }				$data['formspot'] = $endmessage;		$data['title'] = "Contact Us";		$this->load->view('common/header', $data);		$this->load->view('contact_view', $data);		$this->load->view('common/footer');	}}?>